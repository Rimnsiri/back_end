<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enregistest;
use App\Models\Comptedev;
use App\Models\AcceptedTest;

class EnregistestController extends Controller
{
    public function store(Request $request)
    {
        // Validez les données de la requête
        $validatedData = $request->validate([
            'developerEmail' => 'required|email',
            'developerPassword' => 'required',
        ]);
    
        // Vérifiez d'abord si l'e-mail du développeur existe dans la table comptedevs
        $developerEmail = $validatedData['developerEmail'];
        $developer = Comptedev::where('email', $developerEmail)->first();
    
        if (!$developer) {
            // Si l'e-mail du développeur n'existe pas, retournez une erreur
            return response()->json(['message' => 'Vous devez créer un compte pour accéder au test.'], 400);
        }
    
        // Récupérez l'ID du test correspondant au mot de passe du développeur
        $test = AcceptedTest::where('company_password', $validatedData['developerPassword'])->first();
    
        if (!$test) {
            // Si le mot de passe du développeur ne correspond à aucun test, retournez une erreur
            return response()->json(['message' => 'Mot de passe incorrect.'], 400);
        }
    
        // Vérifiez si une entrée correspondant à l'adresse e-mail et au mot-clé existe déjà dans la table Enregistest
        $existingRecord = Enregistest::where('developerEmail', $developerEmail)
                                    ->where('test_id', $test->id)
                                    ->first();
    
        if ($existingRecord) {
            // Si une entrée correspondante est trouvée, vérifiez si le mot-clé est le même
            if ($existingRecord->developerPassword === $validatedData['developerPassword']) {
                // Le développeur essaie de s'enregistrer à nouveau dans le même test, renvoyer une erreur
                return response()->json(['message' => 'Vous ne pouvez vous enregistrer qu\'une seule fois pour ce test.'], 400);
            }
        }
    
        // Si l'e-mail du développeur existe et le mot de passe correspond à un test, créez l'enregistrement Enregistest
        $enregistest = new Enregistest();
        $enregistest->developerEmail = $validatedData['developerEmail'];
        $enregistest->developerPassword = $validatedData['developerPassword'];
        $enregistest->developer_id = $developer->id; // Associez l'ID du développeur à l'enregistrement Enregistest
        $enregistest->test_id = $test->id; // Associez l'ID du test à l'enregistrement Enregistest
        $enregistest->save();
    
        // Retournez une réponse JSON indiquant que les données ont été enregistrées avec succès
        return response()->json([
            'message' => 'Données enregistrées avec succès',
            'developer_id' => $developer->id
        ], 201);
    }
    
    public function index()
{
    // Récupérez toutes les données enregistrées dans Enregistest
    $enregistests = Enregistest::all();

    // Retournez la vue avec les données récupérées
    return view('enregistest.index', ['enregistests' => $enregistests]);
}
public function getTestCountByDeveloper($developerId)
{
    // Compter les inscriptions d'un développeur spécifique
    $count = Enregistest::where('developer_id', $developerId)->count();

    // Vous pouvez retourner ce nombre à une vue ou en tant que réponse JSON
    return response()->json([
        'count' => $count
    ]);
}



}
