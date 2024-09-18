<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcceptedTest;

class AcceptedTestController extends Controller
{
    // Méthode pour afficher la liste des tests acceptés
    public function index()
    {
        $acceptedTests = AcceptedTest::all();
        return view('accepted_tests.index', ['acceptedTests' => $acceptedTests]);
    }
    
    // Méthode pour obtenir la liste des tests acceptés au format JSON
    public function getAcceptedTestById(Request $request, $id)
    {
        // Récupérer le test accepté par son ID
        $test = AcceptedTest::find($id);
    
        if (!$test) {
            // Si aucun test n'est trouvé avec l'ID donné, retourner une réponse JSON indiquant un test introuvable
            return response()->json(['message' => 'Test introuvable'], 404);
        }
    
        // Retourner le test au format JSON
        return response()->json($test);
    }
    
    
    public function getAcceptedTests(Request $request)
    {
        // Récupérer le mot-clé de la requête
        $keyword = $request->query('keyword', ''); // Si aucun mot-clé n'est fourni, utilise une chaîne vide
    
        // Filtrer les tests acceptés basés sur le mot-clé
        $tests = AcceptedTest::where('company_password', 'like', "%{$keyword}%")->get();
    
        // Vérifier si des tests ont été trouvés
        if ($tests->isEmpty()) {
            // Si aucun test n'a été trouvé avec le mot-clé donné, retourner une réponse JSON indiquant qu'aucun test n'a été trouvé
            return response()->json(['message' => 'Aucun test trouvé pour le mot-clé donné'], 404);
        }
    
        // Retourner les tests correspondants au format JSON
        return response()->json($tests);
    }
    
    public function viewPdf($fileName)
{
    // Recherchez le fichier PDF dans la table AcceptedTest en fonction du nom de fichier
    $acceptedTest = AcceptedTest::where('fichier_pdf', $fileName)->first();

    if (!$acceptedTest) {
        // Si le fichier PDF n'est pas trouvé, retournez une réponse 404
        return response()->json(['message' => 'Fichier PDF introuvable'], 404);
    }

    // Construisez le chemin complet du fichier PDF
    $path = storage_path('app/public/tests/' . $fileName);

    // Retournez le fichier PDF en réponse
    return response()->file($path);
}
public function countAcceptedTestsByEnterpriseId($enterpriseId)
{
    try {
        // Compter le nombre de tests acceptés pour l'ID de l'entreprise donné
        $count = AcceptedTest::where('compteentrepris_id', $enterpriseId)->count();

        // Retourner le nombre de tests acceptés au format JSON
        return response()->json(['count' => $count], 200);
    } catch (\Exception $e) {
        // En cas d'erreur, retourner une réponse d'erreur avec le code 500
        return response()->json(['error' => 'Une erreur s\'est produite lors du comptage des tests acceptés.'], 500);
    }
}

}
