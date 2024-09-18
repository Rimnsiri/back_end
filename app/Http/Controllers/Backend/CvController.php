<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cv;
use App\Models\Dev;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;






class CvController extends Controller
{
    // Afficher la liste des CVs
    public function index()
    {

        $cvs = Cv::with('skills')->get();
        return view('cvs.index', compact('cvs'));
    }



    public function create(Request $request)
    {
        $skills = Skill::all();
        $devs = Dev::all();
        $selectedDevId = $request->query('dev_id'); // Récupère l'ID du développeur depuis l'URL

        return view('cvs.create', compact('devs', 'skills', 'selectedDevId'));
    }







    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'dev_id' => 'sometimes|required|exists:devs,id',
            'french_level' => 'nullable|string',
            'english_level' => 'nullable|string',
            'tjm' => 'sometimes|required|numeric',
            'niveau' => 'sometimes|required|string',
            'ispublic' => 'required|boolean',
        ]);

        $cv = Cv::create($validatedData);

        if ($request->has('education')) {
            foreach ($request->education as $education) {
                $validatedEducation = Validator::make($education, [
                    'diplome' => 'nullable|string|max:255',
                    'école' => 'nullable|string|max:255',
                    'startdate' => 'nullable|date',
                    'enddate' => 'nullable|date|after_or_equal:startdate',
                    'description' => 'nullable|string',
                ])->validate();

                $cv->educations()->create($validatedEducation);
            }
        }
        if ($request->has('experience')) {
            foreach ($request->experience as $experienceData) {
                $experienceData['cv_id'] = $cv->id;

                $validatedExperience = Validator::make($experienceData, [
                    'cv_id' => 'required|exists:cvs,id',
                    'title' => 'nullable|string|max:255',
                    'entreprisename' => 'nullable|string|max:255',
                    'startdate' => 'nullable|date',
                    'enddate' => 'nullable|date|after_or_equal:startdate',
                    'description' => 'nullable|string',
                ])->validate();

                // Créer l'expérience
                $experience = Experience::create($validatedExperience);

                // Vous pouvez ajouter le traitement des compétences ici si nécessaire
            }
        }



        if ($request->has('newSkillName') && is_array($request->newSkillName)) {
            foreach ($request->newSkillName as $index => $skillId) {
                $skill = Skill::find($skillId);
                if (!$skill) {
                    return redirect()->back()->withInput()->withErrors(['errors' => 'Invalid skill selected']);
                }

                $cv->skills()->attach($skillId, [
                    'nbrmonth' => $request->newSkillNbrMonth[$index],
                    'isprincipal' => isset($request->newSkillIsPrincipal[$index]) && $request->newSkillIsPrincipal[$index] == 1 ? true : false,
                ]);
            }
        }

        return redirect()->route('cvs.index')->with('success', 'CV créé avec succès.');
    }




    public function show(Cv $cv)
    {
        $dev = $cv->dev;
        return view('cvs.show', compact('cv', 'dev'));
    }

    public function edit(Cv $cv)
    {
        $devs = Dev::all(); // Récupère tous les développeurs
        $skills = Skill::all();

        return view('cvs.edit', compact('cv', 'devs', 'skills'));
    }

    public function update(Request $request, Cv $cv)
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
            'ispublic' => 'nullable|boolean',
            // Dans votre méthode validate
            'skills.*.new_skill_id' => 'sometimes|exists:skills,id',
            'skills.*.nbrmonth' => 'required_with:skills.*.new_skill_id|numeric|min:0',
            'skills.*.isprincipal' => 'required_with:skills.*.new_skill_id|boolean',

        ]);
        // Update the CV with validated data
        $cvData = array_merge($data, [
            'french_level' => $request->french_level,
            'english_level' => $request->english_level,
            'niveau' => $request->niveau,
        ]);
        $cv->update($data);


        // Assuming a single experience for simplicity
        $experience = $cv->experiences()->first();

        if ($request->has('new_experience')) {
            $newExperienceData = $request->input('new_experience');

            // Vérifier si le titre n'est pas vide
            if (!empty($newExperienceData['title'])) {
                // Créer une nouvelle expérience
                $newExperience = new Experience([
                    'cv_id' => $cv->id,
                    'title' => $newExperienceData['title'],
                    'entreprisename' => $newExperienceData['entreprisename'],
                    'startdate' => $newExperienceData['startdate'],
                    'enddate' => $newExperienceData['enddate'],
                    'description' => $newExperienceData['description'],
                ]);

                // Enregistrer la nouvelle expérience
                $cv->experiences()->save($newExperience);

                // Synchroniser les compétences pour la nouvelle expérience
                $skillsIds = $newExperienceData['skills'] ?? [];
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
                            // Mettre à jour les données de l'expérience
                            $experience->update([
                                'title' => $experienceData['title'],
                                'entreprisename' => $experienceData['entreprisename'],
                                'startdate' => $experienceData['startdate'],
                                'enddate' => $experienceData['enddate'],
                                'description' => $experienceData['description'],
                            ]);
                        }
                    } else {
                        // Ajout d'une nouvelle expérience
                        $newExperience = new Experience([
                            'cv_id' => $cv->id,
                            'title' => $experienceData['title'],
                            'entreprisename' => $experienceData['entreprisename'],
                            'startdate' => $experienceData['startdate'],
                            'enddate' => $experienceData['enddate'],
                            'description' => $experienceData['description'],
                        ]);
                        $cv->experiences()->save($newExperience);
                    }
                }
            }
        }






        // Méthode pour modifier, ajouter et suggérer la suppression des compétences
        if ($request->has('skills')) {
            // Récupérer les IDs des compétences existantes dans la requête
            $skillsInRequest = collect($request->input('skills'))->pluck('id')->toArray();

            // Détacher les compétences qui ne sont pas présentes dans la requête
            $skillsToRemove = $cv->skills()->whereNotIn('skills.id', $skillsInRequest)->pluck('skills.id')->toArray();

            $cv->skills()->detach($skillsToRemove);

            foreach ($request->input('skills') as $skillData) {
                // Vérifier si la compétence existe déjà dans le CV
                if ($cv->skills->contains($skillData['id'])) {
                    // Mettre à jour la compétence existante
                    $cv->skills()->updateExistingPivot($skillData['id'], [
                        'nbrmonth' => $skillData['nbrmonth'],
                        'isprincipal' => $skillData['isprincipal'] ?? false,
                    ]);
                } else {
                    // Ajouter la compétence au CV
                    $cv->skills()->attach($skillData['id'], [
                        'nbrmonth' => $skillData['nbrmonth'],
                        'isprincipal' => $skillData['isprincipal'] ?? false,
                    ]);
                }
            }
        } else {
            // Suggérer la suppression de toutes les compétences existantes dans le CV
            $cv->skills()->detach();
        }



        if ($request->has('new_skills')) {
            foreach ($request->input('new_skills') as $index => $skillData) {
                if (isset($skillData['new_skill_id'])) {
                    // Nouvelle compétence
                    $cv->skills()->attach($skillData['new_skill_id'], [
                        'nbrmonth' => $skillData['nbrmonth'] ?? 0,
                        'isprincipal' => isset($skillData['isprincipal']) ? $skillData['isprincipal'] : false
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
                        'cv_id' => $cv->id,
                        'diplome' => $newEducationData['diplome'],
                        'école' => $newEducationData['école'], // Utilisez 'école' au lieu de 'ecole'
                        'startdate' => $newEducationData['startdate'],
                        'enddate' => $newEducationData['enddate'],
                        'description' => $newEducationData['description'],
                    ]);

                    // Enregistrer la nouvelle éducation
                    $cv->educations()->save($newEducation);
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
                            // Mettre à jour les données de l'éducation
                            $education->update([
                                'diplome' => $educationData['diplome'],
                                'école' => $educationData['école'],
                                'startdate' => $educationData['startdate'],
                                'enddate' => $educationData['enddate'],
                                'description' => $educationData['description'],
                            ]);
                        }
                    } else {
                        // Ajout d'une nouvelle éducation
                        $newEducation = new Education([
                            'cv_id' => $cv->id,
                            'diplome' => $educationData['diplome'],
                            'école' => $educationData['école'],
                            'startdate' => $educationData['startdate'],
                            'enddate' => $educationData['enddate'],
                            'description' => $educationData['description'],
                        ]);
                        $cv->educations()->save($newEducation);
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
                $cv->skills()->detach($skillId);
            }
        }



        // Redirect with a success message
        return redirect()->route('cvs.index')->with('success', 'CV updated successfully.');
    }




    public function destroy(Cv $cv)
    {
        $cv->delete();
        return redirect()->route('cvs.index')->with('success', 'CV supprimé avec succès.');
    }

    public function cvdev(Request $request)
{
    // Récupérer l'utilisateur actuellement authentifié
   

    // Valider les données du formulaire
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'french_level' => 'nullable|string',
        'english_level' => 'nullable|string',
        'tjm' => 'required|numeric',
        'niveau' => 'required|string',
        'ispublic' => 'required|boolean',
        
    ]);

    // Récupérer le dev_id de l'utilisateur authentifié
    $devId = $request->input('dev_id');
   


    // Créer le CV avec les données validées
    $cv = Cv::create(array_merge($validatedData, ['dev_id' => $devId]));


        // Gérer les éducations
      // Dans votre méthode où vous traitez le CV reçu
if ($request->has('educations')) {
    foreach ($request->educations as $educationData) {
        $educationData['cv_id'] = $cv->id;
        $validatedEducation = Validator::make($educationData, [
            'cv_id' => 'required|exists:cvs,id',
            'diplome' => 'required|string|max:255',
            'école' => 'required|string|max:255', // Utiliser 'école' avec accent
            'startdate' => 'required|date',
            'enddate' => 'nullable|date|after_or_equal:startdate',
            'description' => 'nullable|string',
        ])->validate();

        $cv->educations()->create($validatedEducation);
    }
}


        // Gérer les expériences
        if ($request->has('experiences')) {
            foreach ($request->experiences as $experienceData) {
                $experienceData['cv_id'] = $cv->id;
                $validatedExperience = Validator::make($experienceData, [
                    'cv_id' => 'required|exists:cvs,id',
                    'title' => 'required|string|max:255',
                    'entreprisename' => 'required|string|max:255',
                    'startdate' => 'required|date',
                    'enddate' => 'nullable|date|after_or_equal:startdate',
                    'description' => 'nullable|string',
                ])->validate();
        
                $cv->experiences()->create($validatedExperience);
            }
        }
        

        // Ajouter des compétences
      // Ajouter des compétences
if ($request->has('skills')) {
    foreach ($request->skills as $skillData) {
        $cv->skills()->attach($skillData['newSkillName'], [
            'nbrmonth' => $skillData['newSkillNbrMonth'],
            'isprincipal' => $skillData['newSkillIsPrincipal'] ?? false,
        ]);
    }
}


        // Retourner la réponse avec le CV créé
        return response()->json(['message' => 'CV créé avec succès.', 'cv' => $cv], 201);
    }
    public function getCvsByDeveloper($devId)
{
    $cvs = Cv::where('dev_id', $devId)->get(['id', 'title', 'description' ,'tjm']); 
    return response()->json($cvs);
}
public function showcv(Cv $cv)
{
    $cv->load('dev', 'skills', 'experiences', 'educations'); // Eager loading pour optimiser la requête
    return response()->json($cv);
}

public function destroycv(Cv $cv)
{
    $cv->delete();
    return response()->json(['message' => 'CV supprimé avec succès.'], 200);
}
  

public function updatecv(Request $request, Cv $cv)
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
            'ispublic' => 'nullable|boolean',
            // Dans votre méthode validate
            'skills.*.new_skill_id' => 'sometimes|exists:skills,id',
            'skills.*.nbrmonth' => 'required_with:skills.*.new_skill_id|numeric|min:0',
            'skills.*.isprincipal' => 'required_with:skills.*.new_skill_id|boolean',

        ]);
        // Update the CV with validated data
        $cvData = array_merge($data, [
            'french_level' => $request->french_level,
            'english_level' => $request->english_level,
            'niveau' => $request->niveau,
        ]);
        $cv->update($data);


        // Assuming a single experience for simplicity
        $experience = $cv->experiences()->first();

        if ($request->has('new_experience')) {
            $newExperienceData = $request->input('new_experience');

            // Vérifier si le titre n'est pas vide
            if (!empty($newExperienceData['title'])) {
                // Créer une nouvelle expérience
                $newExperience = new Experience([
                    'cv_id' => $cv->id,
                    'title' => $newExperienceData['title'],
                    'entreprisename' => $newExperienceData['entreprisename'],
                    'startdate' => $newExperienceData['startdate'],
                    'enddate' => $newExperienceData['enddate'],
                    'description' => $newExperienceData['description'],
                ]);

                // Enregistrer la nouvelle expérience
                $cv->experiences()->save($newExperience);

                // Synchroniser les compétences pour la nouvelle expérience
                $skillsIds = $newExperienceData['skills'] ?? [];
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
                            // Mettre à jour les données de l'expérience
                            $experience->update([
                                'title' => $experienceData['title'],
                                'entreprisename' => $experienceData['entreprisename'],
                                'startdate' => $experienceData['startdate'],
                                'enddate' => $experienceData['enddate'],
                                'description' => $experienceData['description'],
                            ]);
                        }
                    } else {
                        // Ajout d'une nouvelle expérience
                        $newExperience = new Experience([
                            'cv_id' => $cv->id,
                            'title' => $experienceData['title'],
                            'entreprisename' => $experienceData['entreprisename'],
                            'startdate' => $experienceData['startdate'],
                            'enddate' => $experienceData['enddate'],
                            'description' => $experienceData['description'],
                        ]);
                        $cv->experiences()->save($newExperience);
                    }
                }
            }
        }






        // Méthode pour modifier, ajouter et suggérer la suppression des compétences
        if ($request->has('skills')) {
            // Récupérer les IDs des compétences existantes dans la requête
            $skillsInRequest = collect($request->input('skills'))->pluck('id')->toArray();

            // Détacher les compétences qui ne sont pas présentes dans la requête
            $skillsToRemove = $cv->skills()->whereNotIn('skills.id', $skillsInRequest)->pluck('skills.id')->toArray();

            $cv->skills()->detach($skillsToRemove);

            foreach ($request->input('skills') as $skillData) {
                // Vérifier si la compétence existe déjà dans le CV
                if ($cv->skills->contains($skillData['id'])) {
                    // Mettre à jour la compétence existante
                    $cv->skills()->updateExistingPivot($skillData['id'], [
                        'nbrmonth' => $skillData['nbrmonth'],
                        'isprincipal' => $skillData['isprincipal'] ?? false,
                    ]);
                } else {
                    // Ajouter la compétence au CV
                    $cv->skills()->attach($skillData['id'], [
                        'nbrmonth' => $skillData['nbrmonth'],
                        'isprincipal' => $skillData['isprincipal'] ?? false,
                    ]);
                }
            }
        } else {
            // Suggérer la suppression de toutes les compétences existantes dans le CV
            $cv->skills()->detach();
        }



        if ($request->has('new_skills')) {
            foreach ($request->input('new_skills') as $index => $skillData) {
                if (isset($skillData['new_skill_id'])) {
                    // Nouvelle compétence
                    $cv->skills()->attach($skillData['new_skill_id'], [
                        'nbrmonth' => $skillData['nbrmonth'] ?? 0,
                        'isprincipal' => isset($skillData['isprincipal']) ? $skillData['isprincipal'] : false
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
                        'cv_id' => $cv->id,
                        'diplome' => $newEducationData['diplome'],
                        'école' => $newEducationData['école'], // Utilisez 'école' au lieu de 'ecole'
                        'startdate' => $newEducationData['startdate'],
                        'enddate' => $newEducationData['enddate'],
                        'description' => $newEducationData['description'],
                    ]);

                    // Enregistrer la nouvelle éducation
                    $cv->educations()->save($newEducation);
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
                            // Mettre à jour les données de l'éducation
                            $education->update([
                                'diplome' => $educationData['diplome'],
                                'école' => $educationData['école'],
                                'startdate' => $educationData['startdate'],
                                'enddate' => $educationData['enddate'],
                                'description' => $educationData['description'],
                            ]);
                        }
                    } else {
                        // Ajout d'une nouvelle éducation
                        $newEducation = new Education([
                            'cv_id' => $cv->id,
                            'diplome' => $educationData['diplome'],
                            'école' => $educationData['école'],
                            'startdate' => $educationData['startdate'],
                            'enddate' => $educationData['enddate'],
                            'description' => $educationData['description'],
                        ]);
                        $cv->educations()->save($newEducation);
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
                $cv->skills()->detach($skillId);
            }
        }



        // Redirect with a success message
        return response()->json(['message' => 'CV mis à jour avec succès.'], 200);
    }
    public function countCvsByDeveloper($devId)
    {
        // Compter le nombre de CVs pour un développeur spécifique
        $count = Cv::where('dev_id', $devId)->count();
    
        // Retourner le résultat sous forme de réponse JSON
        return response()->json([
            'dev_id' => $devId,
            'cv_count' => $count
        ]);
    }
    
}
