<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dev;
use App\Models\Cv;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;




class DevController extends Controller
{
    // Afficher la liste des devs
    public function index(Request $request)
    {
        $search = $request->query('search');
        if ($search) {
            $devs = Dev::where('firstname', 'LIKE', "%{$search}%")->get();
        } else {
            $devs = Dev::all();
        }

        return view('devs.index', compact('devs'));
    }

    
    public function apiIndex(Request $request)
    {
        $criteria = json_decode($request->input('searchCriteria'), true);
        
        // Vérifier si la clé technologies est une chaîne et la convertir en tableau
        if (isset($criteria['technologies']) && is_string($criteria['technologies'])) {
            $criteria['technologies'] = explode(',', $criteria['technologies']);
        }
    
        Log::info('Critères de recherche reçus:', ['criteria' => $criteria]);
    
        $query = Cv::query();
    
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
    
        $cvs = $query->with(['dev', 'skills' => function($query) {
            // Filtrer les compétences `isontop` dans la table `skills`
            $query->where('isontop', true);
        }])->get();
    
        // Extraire les développeurs uniques
        $devs = $cvs->flatMap(function ($cv) {
            if ($cv->ispublic) {
                $dev = clone $cv->dev;
                $dev->tjm = $cv->tjm;
                $dev->ispublic = $cv->ispublic;
                $dev->niveau = $cv->niveau;
                $dev->skills = $cv->skills->where('pivot.isontop', true);
                return [$dev];
            }
            return [];
        })->unique('id');
    
        Log::info('Résultats de la recherche:', ['devs' => $devs]);
    
        return response()->json($devs);
    }
    






    // Montrer le formulaire de création 
    public function create()
    {
        return view('devs.create');
    }

  
    public function store(Request $request)
    {
        // Valider les données entrées par l'utilisateur
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'presentation' => 'required|string',
            'email' => 'required|string|email|max:255|unique:devs',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255', 
            'photo' => 'nullable|image|max:1999',
        ]);

       
        $devs = new Dev();
        $devs->name = $request->name;
        $devs->firstname = $request->firstname;
        $devs->presentation = $request->presentation;
        $devs->email = $request->email;
        $devs->phone = $request->phone;
        $devs->address = $request->address; 

        // 'upload de l'image 
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);

            $devs->photo = $fileNameToStore;
        }

        $devs->save();

        return redirect()->route('devs.index')->with('success', 'développeur created successfullys.');
    }

   
   
    
    public function show($id)
    {
        $dev = Dev::with(['cvs.skills', 'cvs.experiences', 'cvs.educations'])->findOrFail($id);
        return view('devs.show', compact('dev'));
    }
    

   
    public function edit($id)
    {
        $dev = Dev::find($id);
        return view('devs.edit', compact('dev'));
    }


  
    public function update(Request $request, $id)
    {
        $dev = Dev::find($id);

        $request->validate([
            'name' => 'required', 
            'photo' => 'sometimes|image|max:5000', 
        ]);

      
        $dataToUpdate = $request->except('photo');

        if ($request->hasFile('photo')) {
            $oldImage = $dev->photo;
            if ($oldImage && Storage::exists('public/photos/' . $oldImage)) {
                Storage::delete('public/photos/' . $oldImage);
            }

            // Télécharger  nouvelle image 
            $path = $request->file('photo')->store('photos', 'public');
            $dataToUpdate['photo'] = basename($path); 
        }

        $dev->update($dataToUpdate);



        return redirect()->route('devs.index')->with('success', 'Dev updated successfully.');
    }


    public function destroy($id)
    {
        Dev::find($id)->delete();
        return redirect()->route('devs.index')
            ->with('success', 'Dev  deleted successfully.');
    }


    public function getPublicCV($devId)
    {
        $cv = Cv::with(['dev', 'experiences','experiences.skills','educations', 'skills' => function ($query) {

            $query->withPivot('nbrmonth', 'isprincipal','isontop');
        }])
            ->where('dev_id', $devId)
            ->where('ispublic', 1)
            ->first();

        if (!$cv) {
            return response()->json(['message' => 'Public CV not found for this developer'], 404);
        }

        return response()->json($cv);
    }


    public function addprofile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'presentation' => 'required|string',
            'email' => 'required|string|email|max:255|unique:devs',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|max:1999',
           
        ]);
    
        $dev = new Dev($validated);
    
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
    
            $dev->photo = $fileNameToStore;
        }
    
        $dev->comptedev_id = $request->input('comptedev_id', null);
    
        $dev->save();
    
        return response()->json(['message' => 'Profil de développeur créé avec succès', 'dev' => $dev], 201);
    }

    public function profile($id)
    {
        $dev = Dev::where('comptedev_id', $id)->first();
    
        if ($dev) {
            $dev->photo = asset('storage/photos/' . $dev->photo);
            return response()->json($dev);
        } else {
            return response()->json(['message' => 'Profil non trouvé'], 404);
        }
    }
    
    public function getDevProfile($id)
{
    $dev = Dev::find($id);
    if (!$dev) {
        return response()->json(['message' => 'Developer not found'], 404);
    }
    return response()->json($dev);
}

    
    public function updateprofil(Request $request, $id)
    {
        $dev = Dev::find($id);

        $request->validate([
            'name' => 'required', 
            'photo' => 'sometimes|image|max:5000', 
        ]);

       
        $dataToUpdate = $request->except('photo');

       
        if ($request->hasFile('photo')) {
            $oldImage = $dev->photo;
            if ($oldImage && Storage::exists('public/photos/' . $oldImage)) {
                Storage::delete('public/photos/' . $oldImage);
            }
           
            $path = $request->file('photo')->store('photos', 'public');
            $dataToUpdate['photo'] = basename($path); 
        }

        $dev->update($dataToUpdate);



        return response()->json(['message' => 'Profil est updated'], 200);
    }
    
    public function getDevelopersWithNotes()
    {
        // Récupérer tous les développeurs avec leurs notes
        $developers = Dev::leftJoin('reponse_tests', 'devs.id', '=', 'reponse_tests.id_devp')
                        ->select('devs.*', 'reponse_tests.note')
                        ->get();
    
        // Parcourir les développeurs pour définir la note à 0 s'il n'y a pas de note enregistrée
        foreach ($developers as $developer) {
            $developer->note = $developer->note ?? 0; // Par défaut, la note est 0 si elle n'est pas définie
            
            // Mettre à jour la colonne note dans la table devs
            $dev = Dev::find($developer->id);
            $dev->note = $developer->note;
            $dev->save();
        }
    
        return response()->json($developers);
    }
 
}
