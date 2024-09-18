<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\AcceptedTest; 
use App\Models\RejectedTest; 
use App\Models\Comptedev;

class TestController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'compteentrepris_id' => 'required|exists:compteentrepris,id',
            'test-title' => 'required|string',
            'test-category' => 'required|string',
            'test-level' => 'required|string',
            'test-duration' => 'required|integer',
            'test-description' => 'required|string',
            'test-file' => 'file|mimes:pdf|max:2048', // Validation spécifique pour le fichier PDF
            'company_password' => 'required|string',
        ]);
        $existingTest = AcceptedTest::where('company_password', $request->input('company_password'))->first();
    if ($existingTest) {
        return response()->json(['message' => 'Ce mot de passe est déjà utilisé pour un autre test. Veuillez en choisir un autre.'], 400);
    }
        // Création d'un nouveau test
        $test = new Test;
        $test->compteentrepris_id = $request->input('compteentrepris_id');
        $test->nom = $request->input('test-title');
        $test->description = $request->input('test-description');
        $test->duree_estimee = $request->input('test-duration');
        $test->categorie = $request->input('test-category');
        $test->niveau = $request->input('test-level');
        $test->company_password = $request->input('company_password'); // Ajoutez le champ company_password
        
        // Vérifiez si un fichier a été téléchargé
        if ($request->hasFile('test-file')) {
            // Obtenez le fichier téléchargé
            $file = $request->file('test-file');
    
            // Générez un nom unique pour le fichier
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Stockez le fichier dans le dossier de stockage de Laravel (par défaut dans "storage/app/public")
            $file->storeAs('public/tests', $fileName);
    
            // Enregistrez le chemin du fichier dans la base de données
            $test->fichier_pdf = $fileName;
        }
    
        // Sauvegarde du test
        $test->save();
    
        // Retourner une réponse JSON pour indiquer que le test a été créé avec succès
        return response()->json(['message' => 'Test créé avec succès'], 201);
    }
    
    public function index()
{
    $tests = Test::all();
    return view('tests.index', ['tests' => $tests]);
}
public function accept($id)
{
    $test = Test::findOrFail($id);

    // Créer un test accepté
    AcceptedTest::create([
        'compteentrepris_id' => $test->compteentrepris_id,
        'nom' => $test->nom,
        'description' => $test->description,
        'duree_estimee' => $test->duree_estimee,
        'categorie' => $test->categorie,
        'niveau' => $test->niveau,
        'fichier_pdf' => $test->fichier_pdf, 
        'company_password' => $test->company_password, 
        
    ]);

    // Supprimer le test de la table des tests normaux
    $test->delete();

    return redirect()->back()->with('success', 'Test accepté avec succès');
}

public function reject($id)
{
    $test = Test::findOrFail($id);

    // Créer un test rejeté
    RejectedTest::create([
        'compteentrepris_id' => $test->compteentrepris_id,
        'nom' => $test->nom,
        'description' => $test->description,
        'duree_estimee' => $test->duree_estimee,
        'categorie' => $test->categorie,
        'niveau' => $test->niveau,
    ]);

    // Supprimer le test de la table des tests normaux
    $test->delete();

    return redirect()->back()->with('success', 'Test rejeté avec succès');
}


public function accepted()
{
    $acceptedTests = AcceptedTest::all();
    return view('tests.accepted', ['acceptedTests' => $acceptedTests]);
}

public function rejected()
{
    $rejectedTests = RejectedTest::all();
    return view('tests.rejected', ['rejectedTests' => $rejectedTests]);
}

public function verifyTest(Request $request) {
    $keyword = $request->query('keyword');
    $test = AcceptedTest::where('company_password', $keyword)->first(); // Recherche dans la table accepted_tests

    if ($test) {
        return response()->json(['valid' => true, 'testId' => $test->id]);
    } else {
        return response()->json(['valid' => false]);
    }
}

public function getCompanyTests(Request $request)
{
    $companyId = $request->query('compteentrepris_id');  

    if (!$companyId) {
        return response()->json(['message' => 'ID de l\'entreprise requis'], 400);
    }

    $tests = Test::where('compteentrepris_id', $companyId)
                 ->get(['id', 'nom', 'description', 'statut','categorie']);

    return response()->json($tests);
}
    
}
