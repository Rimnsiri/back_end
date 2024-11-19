<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dev;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Spatie\Browsershot\Browsershot;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;


class DevController extends Controller
{
    // Afficher la liste des CVs
    public function index()
    {
        // Récupérer les développeurs avec 'isontop' = 1
        $topDevs = Dev::with('skills')
            ->where('isontop', 1)
            ->orderBy('isontop', 'desc')
            ->take(3) // On limite à 3 pour afficher seulement les 3 premiers si on en a 3 ou plus
            ->get();
        
        // Vérifier si on a moins de 3 développeurs "isontop"
        if ($topDevs->count() < 3) {
            // Récupérer les développeurs qui n'ont pas 'isontop' = 1
            $remainingDevs = Dev::with('skills')
                ->where('isontop', '!=', 1)
                ->take(3 - $topDevs->count()) // Prendre le nombre nécessaire pour compléter à 3
                ->get();
            
            // Ajouter ces développeurs non "isontop" pour compléter la liste à 3
            $topDevs = $topDevs->merge($remainingDevs);
        }
        
        // Passer uniquement les trois développeurs finaux à la vue
        return view('devs.index', compact('topDevs'));
    }
    
    
    

    public function create(Request $request)
    {
        $skills = Skill::all();

        return view('devs.create', compact( 'skills'));
    }

    public function apiIndex(Request $request)
    {
        $criteria = json_decode($request->input('searchCriteria'), true);
        $isOnTopOnly = $request->boolean('is_on_top_only', false);
        // Vérifier si la clé technologies est une chaîne et la convertir en tableau
        if (isset($criteria['technologies']) && is_string($criteria['technologies'])) {
            $criteria['technologies'] = explode(',', $criteria['technologies']);
        }
    
        Log::info('Critères de recherche reçus:', ['criteria' => $criteria]);
    
        $query = Dev::query();
    
        // Filtre par TJM
        if (isset($criteria['tjmMin'])) {
            $query->where('tjm', '>=', $criteria['tjmMin']);
        }
        if (isset($criteria['tjmMax'])) {
            $query->where('tjm', '<=', $criteria['tjmMax']);
        }
    
        // Filtre par niveau
        if (!empty($criteria['niveau'])) {
            $query->whereIn('niveau', $criteria['niveau']);
        }
    
        // Filtre par technologies
        if (!empty($criteria['technologies'])) {
            $techCount = count($criteria['technologies']);
            $query->whereHas('skills', function ($subQuery) use ($criteria) {
                $subQuery->whereIn('name', $criteria['technologies']);
            }, '=', $techCount); // Assurez-vous d'avoir autant de correspondances que de technologies demandées
        }
        if ($isOnTopOnly) {
            $query->where('isontop', true);
        }
        $devs = $query->with(['skills' => function($query) {
            // Filtrer les compétences `isontop` dans la table `skills`
            $query->where('isontop', true);
        }])->get();
    
        // Extraire les développeurs unique
        $results = $devs->map(function ($dev) {
            return [
                'id' => $dev->id,
                'name' => $dev->name,
                'firstname' => $dev->firstname,
                'tjm' => $dev->tjm,
                'niveau' => $dev->niveau,
                'skills' => $dev->skills->where('pivot.isontop', true),
                'photo' => $dev->photo,
                'ispublic' => $dev->ispublic,
                'isontop' =>$dev->isontop,
            ];
        });
    
        Log::info('Résultats de la recherche:', ['results' => $results]);
    
        return response()->json($results);
    }



    public function getPublicCV($devId)
    {
        $dev = Dev::with(['experiences','experiences.skills','educations', 'skills' => function ($query) {
            $query->withPivot('nbrmonth', 'isprincipal','isontop')
                  ->orderBy('dev_skills.nbrmonth', 'DESC') 
                  ->orderByRaw('LOWER(skills.name) ASC');
        }])
            ->where('id', $devId)  
            ->where('ispublic', 1)
            
            ->first();

        if (!$dev) {
            return response()->json(['message' => 'Public CV not found for this CV ID'], 404);
        }
        

        return response()->json($dev);
    }

    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
            'firstname'=>'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:devs,email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tjm' => 'sometimes|required|numeric',
            'niveau' => 'sometimes|required|string',
            'french_level' => 'nullable|string',
            'english_level' => 'nullable|string',
            'photo' => 'nullable|image|max:1999',
            'ispublic' => 'required|boolean',
            'isontop' =>'nullable|boolean',
        ]);
        if ($request->hasFile('photo')) {
            // Sauvegarde la photo dans le dossier 'public/photos'
            $photoPath = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = basename($photoPath); // Enregistre uniquement le nom du fichier
        }
        $dev = Dev::create($validatedData);
        
        if ($request->has('education')) {
           
            foreach ($request->education as $education) {

                $education['is_current'] = isset($education['is_current']) && $education['is_current'] == '1';

                // Si is_current est 1, enddate doit être null
                if ($education['is_current']) {
                    $education['enddate'] = null;
                }
                
                $validatedEducation = Validator::make($education, [
                    'diplome' => 'nullable|string|max:255',
                    'école' => 'nullable|string|max:255',
                    'startdate' => 'nullable|date',
                    'enddate' => 'nullable|date|after_or_equal:startdate',
                    'description' => 'nullable|string',
                    'is_current' => 'nullable|boolean',
                ])->validate();

                $dev->educations()->create($validatedEducation);
            }
        }
        if ($request->has('experience')) {
          
            foreach ($request->experience as $experienceData) {
                $experienceData['dev_id'] = $dev->id;
                
                $experienceData['is_current'] = isset($experienceData['is_current']) && $experienceData['is_current'] == '1';

            // Si is_current est 1, enddate doit être null
            if ($experienceData['is_current']) {
                $experienceData['enddate'] = null;
            }

                $validatedExperience = Validator::make($experienceData, [
                    'dev_id' => 'required|exists:devs,id',
                    'title' => 'nullable|string|max:255',
                    'entreprisename' => 'nullable|string|max:255',
                    'startdate' => 'nullable|date',
                    'enddate' => 'nullable|date|after_or_equal:startdate',
                    'description' => 'nullable|string',
                    'is_current' => 'nullable|boolean',
                ])->validate();

              
                // Créer l'expérience
                $experience = Experience::create($validatedExperience);
                if (isset($experienceData['skills']) && is_array($experienceData['skills'])) {
                    $experience->skills()->sync($experienceData['skills']); 
                }
                // Vous pouvez ajouter le traitement des compétences ici si nécessaire
            }
        }



        if ($request->has('newSkillName') && is_array($request->newSkillName)) {
            foreach ($request->newSkillName as $index => $skillId) {
                $skill = Skill::find($skillId);
                if (!$skill) {
                    return redirect()->back()->withInput()->withErrors(['errors' => 'Invalid skill selected']);
                }

                $dev->skills()->attach($skillId, [
                    'nbrmonth' => $request->newSkillNbrMonth[$index],
                    'isprincipal' => isset($request->newSkillIsPrincipal[$index]) && $request->newSkillIsPrincipal[$index] == '1',
                    'isontop' => isset($request->newSkillIsontop[$index]) && $request->newSkillIsontop[$index] == '1' ,
                    
                ]);
            }
        }

        return redirect()->route('devs.index')->with('success', 'CV créé avec succès.');
    }




    public function show(Dev $dev)
    {
        
        return view('devs.show', compact('dev'));
    }

    public function edit(Dev $dev)
    {
        // Charger les compétences de l'utilisateur avec les informations de la table pivot
        $dev->load(['skills' => function ($query) {
            $query->orderByDesc('dev_skills.isontop')
                  ->orderByDesc('dev_skills.isprincipal')
                  ->orderByDesc('dev_skills.nbrmonth')
                  ->orderBy('skills.name');
        }]);
    
        // Charger les expériences de l'utilisateur
        $dev->load('experiences.skills');
    
        // Charger toutes les compétences disponibles (si nécessaire)
        $skills = Skill::all(); // Remplacez par la logique nécessaire pour charger les compétences
    
        return view('devs.edit', compact('dev', 'skills'));
    }
    

    public function update(Request $request, Dev $dev)
    {
        

        // Validate the CV fields
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'experiences.*.id' => 'sometimes|exists:experiences,id',
            'experiences.*.title' => 'sometimes|nullable|string|max:255',
            'experiences.*.entreprisename' => 'nullable|string',
            'experiences.*.description' => 'nullable|string',
            'experiences.*.startdate' => 'nullable|date',
            'experiences.*.enddate' => 'nullable|date',
            'technologies.*.id' => 'sometimes|exists:technologies,id',
            'technologies.*.is_checked' => 'required_with:technologies.*.id|boolean',
            // Ajout des règles de validation pour les éducations
            'educations.*.id' => 'sometimes|exists:education,id',
            'educations.*.diplome' => 'required|string',
            'educations.*.école' => 'required|string',
            'educations.*.startdate' => 'required|date',
            'educations.*.enddate' => 'nullable|date',
            'educations.*.description' => 'nullable|string',
            'french_level' => 'nullable|string',
            'english_level' => 'nullable|string',
            'tjm' => 'required|numeric',
            'niveau' => 'required|string',
            'name'=> 'required|string',
            'firstname' =>'required|string',
            'email' =>'required|string',
            'phone' =>'required|numeric',
            'address' =>'required|string',
            'photo' => 'sometimes|image|max:5000',
            'ispublic' => 'nullable|boolean',
            'isontop' =>'nullable|boolean',
            // Dans votre méthode validate
            'skills.*.new_skill_id' => 'sometimes|exists:skills,id',
            'skills.*.nbrmonth' => 'required_with:skills.*.new_skill_id|numeric|min:0',
            'skills.*.isprincipal' => 'required_with:skills.*.new_skill_id|boolean',
            'skills.*.isontop' => 'required_with:skills.*.new_skill_id|boolean',

        ]);
        // Update the CV with validated data
        $devData = array_merge($data, [
            'french_level' => $request->french_level,
            'english_level' => $request->english_level,
            'niveau' => $request->niveau,
        ]);

        unset($data['name']);

        // Vérifiez si une nouvelle photo a été téléchargée
        if ($request->hasFile('photo')) {
            // Supprimez l'ancienne photo si elle existe
            if ($dev->photo && Storage::disk('public')->exists('photos/' . $dev->photo)) {
                Storage::disk('public')->delete('photos/' . $dev->photo);
            }
    
            // Téléchargez la nouvelle image
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = basename($path); // Enregistrer seulement le nom du fichier
        }
        
        $dev->update($data);


        // Assuming a single experience for simplicity
        $experience = $dev->experiences()->first();

        if ($request->has('new_experience')) {
            $newExperienceData = $request->input('new_experience');

            // Vérifier si le titre n'est pas vide
            if (!empty($newExperienceData['title'])) {
                // Créer une nouvelle expérience
                $newExperience = new Experience([
                    'dev_id' => $dev->id,
                    'title' => $newExperienceData['title'],
                    'entreprisename' => $newExperienceData['entreprisename'],
                    'startdate' => $newExperienceData['startdate'],
                    'enddate' => $newExperienceData['enddate'],
                    'description' => $newExperienceData['description'],
                ]);

                // Enregistrer la nouvelle expérience
                $dev->experiences()->save($newExperience);

                // Synchroniser les compétences pour la nouvelle expérience
                $skillsIds = $newExperienceData['technologies'] ?? [];
                $newExperience->skills()->sync($skillsIds);
            }
        }

        
        if ($request->has('experiences')) {
            foreach ($request->input('experiences') as $index => $experienceData) {
                // Vérifier si le titre n'est pas vide
                if (!empty($experienceData['title'])) {
                    if (!empty($experienceData['id'])) {
                        // Mise à jour de l'expérience existante
                        $experience = Experience::find($experienceData['id']);
                        if ($experience) {


                            $isCurrent = isset($experienceData['is_current']) && $experienceData['is_current'];
                            // Déterminer la date de fin
                            $endDate = $isCurrent ? null : $experienceData['enddate'];


                            // Mettre à jour les données de l'expérience
                            $experience->update([
                                'title' => $experienceData['title'],
                                'entreprisename' => $experienceData['entreprisename'],
                                'startdate' => $experienceData['startdate'],
                                'enddate' => $endDate,
                                'is_current' => $isCurrent,
                                'description' => $experienceData['description'],
                            ]);
                            if (isset($experienceData['technologies']) && is_array($experienceData['technologies'])) {
                                // Filtrer et récupérer les IDs des technologies sélectionnées
                                $technologiesIds = array_filter($experienceData['technologies']);
        
                                // Ne synchroniser que si des technologies sont présentes
                                if (!empty($technologiesIds)) {
                                    $experience->skills()->sync($technologiesIds);
                                } else {
                                    // Si aucune technologie n'est cochée, on garde les anciennes sans les effacer
                                    $experience->skills()->sync([]);
                                }
                            }
                        }
                    } else {
                        // Ajout d'une nouvelle expérience
                        $newExperience = new Experience([
                            'dev_id' => $dev->id,
                            'title' => $experienceData['title'],
                            'entreprisename' => $experienceData['entreprisename'],
                            'startdate' => $experienceData['startdate'],
                            'enddate' => $experienceData['enddate'],
                            'description' => $experienceData['description'],
                        ]);
                        $dev->experiences()->save($newExperience);
                        if (isset($experienceData['technologies']) && is_array($experienceData['technologies'])) {
                            $technologiesIds = array_filter($experienceData['technologies']);
        
                            if (!empty($technologiesIds)) {
                                $newExperience->skills()->sync($technologiesIds);
                            }
                        }
                    }
                }
            }
        }






        // Méthode pour modifier, ajouter et suggérer la suppression des compétences
        if ($request->has('skills')) {
            // Récupérer les IDs des compétences existantes dans la requête
            $skillsInRequest = collect($request->input('skills'))->pluck('id')->toArray();

            // Détacher les compétences qui ne sont pas présentes dans la requête
            $skillsToRemove = $dev->skills()->whereNotIn('skills.id', $skillsInRequest)->pluck('skills.id')->toArray();

            $dev->skills()->detach($skillsToRemove);

            foreach ($request->input('skills') as $skillData) {
                // Vérifier si la compétence existe déjà dans le dev
                if ($dev->skills->contains($skillData['id'])) {
                    // Mettre à jour la compétence existante
                    $dev->skills()->updateExistingPivot($skillData['id'], [
                        'nbrmonth' => $skillData['nbrmonth'],
                        'isprincipal' => $skillData['isprincipal'] ?? false,
                        'isontop' => $skillData['isontop'] ?? false,
                    ]);
                } else {
                    // Ajouter la compétence au CV
                    $dev->skills()->attach($skillData['id'], [
                        'nbrmonth' => $skillData['nbrmonth'],
                        'isprincipal' => $skillData['isprincipal'] ?? false,
                        'isontop' => $skillData['isontop'] ?? false,
                    ]);
                }
            }
        } else {
            // Suggérer la suppression de toutes les compétences existantes dans le dev
            $dev->skills()->detach();
        }



        if ($request->has('new_skills')) {
            foreach ($request->input('new_skills') as $index => $skillData) {
                if (isset($skillData['new_skill_id'])) {
                    // Nouvelle compétence
                    $dev->skills()->attach($skillData['new_skill_id'], [
                        'nbrmonth' => $skillData['nbrmonth'] ?? 0,
                        'isprincipal' => isset($skillData['isprincipal']) ? $skillData['isprincipal'] : false,
                        'isontop' => $skillData['isontop'] ?? false,
                    ]);
                }
            }
        }







        // Traitement des nouvelles éducations à ajouter
        if ($request->has('new_educations')) {
            foreach ($request->input('new_educations') as $newEducationData) {
                // Vérifier si le diplôme n'est pas vide
                if (!empty($newEducationData['diplome'])) {
                    // Créer une nouvelle éducation
                    $newEducation = new Education([
                        'dev_id' => $dev->id,
                        'diplome' => $newEducationData['diplome'],
                        'école' => $newEducationData['école'], // Utilisez 'école' au lieu de 'ecole'
                        'startdate' => $newEducationData['startdate'],
                        'enddate' => $newEducationData['enddate'],
                        'description' => $newEducationData['description'],
                    ]);

                    // Enregistrer la nouvelle éducation
                    $dev->educations()->save($newEducation);
                }
            }
        }



        // Traitement des éducations existantes à mettre à jour
        if ($request->has('educations')) {
            foreach ($request->input('educations') as $educationData) {
                // Vérifier si le diplôme n'est pas vide
                if (!empty($educationData['diplome'])) {
                    if (!empty($educationData['id'])) {
                        // Mise à jour de l'éducation existante
                        $education = Education::find($educationData['id']);
                        if ($education) {
                           
                            $isCurrent = isset($educationData['is_current']) && $educationData['is_current'];
                            $endDate = $isCurrent ? null : $educationData['enddate'];
                            // Mettre à jour les données de l'éducation
                            $education->update([
                                'diplome' => $educationData['diplome'],
                                'école' => $educationData['école'],
                                'startdate' => $educationData['startdate'],
                                'enddate' => $endDate,
                               'is_current' => $isCurrent,
                                'description' => $educationData['description'],
                            ]);
                        }
                    } else {
                        // Ajout d'une nouvelle éducation
                        $newEducation = new Education([
                            'dev_id' => $dev->id,
                            'diplome' => $educationData['diplome'],
                            'école' => $educationData['école'],
                            'startdate' => $educationData['startdate'],
                            'enddate' => $educationData['enddate'],
                            'description' => $educationData['description'],
                        ]);
                        $dev->educations()->save($newEducation);
                    }
                }
            }
        }









        try {
            if ($request->input('experiences_to_delete')) {
                $experiencesToDelete = explode(',', $request->input('experiences_to_delete'));
                foreach ($experiencesToDelete as $experienceId) {
                    // Supprime l'expérience de la base de données
                    $experience = Experience::find($experienceId);
                    if ($experience) {
                        $experience->delete();
                    } else {
                        // Gérer le cas où l'expérience n'est pas trouvée
                        // Peut-être enregistrer un message de journalisation pour le suivi
                        Log::warning("Tentative de suppression d'une expérience introuvable avec l'ID : $experienceId");
                    }
                }
            }
        } catch (\Exception $e) {
            // Gérer l'exception capturée
            // Vous pouvez enregistrer un message de journalisation, afficher un message d'erreur à l'utilisateur, etc.
            Log::error("Erreur lors de la suppression des expériences : " . $e->getMessage());
            // Affichez un message d'erreur générique à l'utilisateur
            return back()->with('error', 'Une erreur est survenue lors de la suppression des expériences. Veuillez réessayer.');
        }


        if ($request->input('educations_to_delete')) {
            $educationsToDelete = explode(',', $request->input('educations_to_delete'));
            foreach ($educationsToDelete as $educationId) {
                // Supprime l'éducation de la base de données
                Education::find($educationId)->delete();
            }
        }
        if ($request->input('skills_to_delete')) {
            $skillsToDelete = explode(',', $request->input('skills_to_delete'));
            foreach ($skillsToDelete as $skillId) {
                // Détache la compétence du CV au lieu de la supprimer définitivement
                $dev->skills()->detach($skillId);
            }
        }



        // Redirect with a success message
        return redirect()->route('devs.index')->with('success', 'dev updated successfully.');
    }



    public function destroy(Dev $dev)
    {
        $dev->delete();
        return redirect()->route('devs.index')->with('success', 'dev supprimé avec succès.');
    }

   

    
  

    public function downloadPDF($id)
    {
        // Récupérer le développeur avec ses compétences
        $dev = Dev::with('skills')->findOrFail($id);
    
        // Filtrer les compétences principales et non principales
        $mainSkills = $dev->skills->where('pivot.isprincipal', true);
        $otherSkills = $dev->skills->where('pivot.isprincipal', false);
        $topSkills = $dev->skills->where('pivot.isontop', true);
        $logoUrl = 'https://devfactoryserver.cc/images/logo_devfactory%20(1).png';

        // Charger la vue PDF en passant les données nécessaires
        $pdf = Pdf::loadView('devs.pdf', compact('dev', 'mainSkills', 'otherSkills','topSkills','logoUrl'))
                  ->setPaper('a4', 'portrait');
                  

                  $pdf->getDomPDF()->setHttpContext(
                    stream_context_create([
                        'ssl' => [
                            'verify_peer' => FALSE,
                            'verify_peer_name' => FALSE,
                            'allow_self_signed' => TRUE,
                        ]
                    ])
                );
    
        return $pdf->download('dev-profile.pdf');
    }
    
    
    
    
    


  


   
    
}
