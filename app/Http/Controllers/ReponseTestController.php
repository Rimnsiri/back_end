<?php

namespace App\Http\Controllers;
use App\Models\AcceptedTest; 
use Illuminate\Http\Request;
use App\Models\ReponseTest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Importez la façade Log
class ReponseTestController extends Controller
{
    // Méthode pour enregistrer le temps de début et la réponse
    public function updateStartTime(Request $request)
{
    $idTest = $request->input('id_test');
    $idDevp = $request->input('id_devp');
    $compteentrepris_id=$request->input('compteentrepris_id');

    // Créer une nouvelle instance de ReponseTest pour enregistrer le temps de début du test
    $reponseTest = ReponseTest::create([
        'start_time' => Carbon::now(),
        'id_test' => $idTest,
        'id_devp' => $idDevp,
        'compteentrepris_id' =>$compteentrepris_id,
        'reponse' => '', // Assurez-vous de fournir une valeur par défaut pour le champ 'reponse'
    ]);

    // Répondre avec un message de succès et les ID du test et du développeur
    return response()->json([
        'message' => 'start_time enregistré avec succès',
        'data' => [
            'id_test' => $idTest,
            'id_devp' => $idDevp,
            'compteentrepris_id' =>$compteentrepris_id
        ]
    ], 200);
}


public function store(Request $request)
{
    // Récupérer l'ID du test à partir de la requête
    $idTest = $request->input('id_test');

    // Recherchez la dernière réponse enregistrée dans la base de données sans end_time
    $lastResponse = ReponseTest::whereNull('end_time')->latest()->first();

    // Vérifiez s'il y a une réponse en cours
    if ($lastResponse) {
        // Si une réponse en cours existe, ne créez pas de nouvelle instance
        return response()->json(['message' => 'start_time déjà enregistré pour la réponse en cours'], 200);
    }

    // Créez une nouvelle instance de ReponseTest pour enregistrer le temps de début du test
    $reponseTest = ReponseTest::create([
        'start_time' => Carbon::now(), // Enregistrez le temps de début actuel
        'id_test' => $idTest, // Enregistrez l'ID du test
        'reponse' => $request->input('reponse'), // Enregistrez la réponse
    ]);

    // Répondre avec un message de succès
    return response()->json(['message' => 'start_time enregistré avec succès'], 200);
}

    // Méthode pour enregistrer le temps de fin et la réponse
    public function updateEndTime(Request $request)
    {
        // Recherchez la dernière réponse enregistrée dans la base de données sans end_time
        $lastResponse = ReponseTest::whereNull('end_time')->latest()->first();
    
        // Vérifiez s'il y a une réponse en cours
        if (!$lastResponse) {
            // Si aucune réponse en cours n'est trouvée, renvoyez une erreur
            return response()->json(['error' => 'Aucune réponse en cours pour enregistrer le temps de fin'], 404);
        }
    
        // Mettez à jour le temps de fin de la dernière réponse en cours
        $lastResponse->update([
            'end_time' => Carbon::now(), // Enregistrez le temps de fin actuel
            'reponse' => $request->input('reponse'), // Enregistrez la réponse
        ]);
    
        // Répondre avec un message de succès
        return response()->json(['message' => 'end_time enregistré avec succès'], 200);
    }

    public function index()
    {
        try {
            $reponseTests = ReponseTest::all();
            $reponseTestsArray = $reponseTests->toArray(); // Convertir la collection en tableau
            Log::info('Réponses de test récupérées avec succès:', $reponseTestsArray);
            if ($reponseTests->isEmpty()) {
                Log::warning('Aucune réponse de test n\'a été trouvée dans la base de données.');
            }
            return view('reponse-tests.index', compact('reponseTests'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des réponses de test:', ['exception' => $e]);
            return response()->json(['error' => 'Une erreur s\'est produite lors de la récupération des réponses de test.'], 500);
        }
    }
    
   
   public function getResponsesByEnterpriseId($enterpriseId)
   {
       try {
           $responses = ReponseTest::with(['acceptedTest', 'dev'])
               ->where('compteentrepris_id', $enterpriseId)
               ->orderBy('note', 'desc')
               ->get();
           return response()->json(['responses' => $responses], 200);
       } catch (\Exception $e) {
           return response()->json(['error' => 'Une erreur s\'est produite lors de la récupération des réponses de test.'], 500);
       }
   }
   public function getResponseById($id)
   {
       try {
           $response = ReponseTest::with(['acceptedTest', 'dev'])
               ->findOrFail($id);
           return response()->json(['response' => $response], 200);
       } catch (\Exception $e) {
           return response()->json(['error' => 'Erreur lors de la récupération des détails de la réponse.'], 500);
       }
   }
   public function updateNote(Request $request, $id)
    {
        $this->validate($request, [
            'note' => 'required|integer|min:0|max:20'
        ]);

        try {
            $reponseTest = ReponseTest::findOrFail($id);
            $reponseTest->note = $request->input('note');
            $reponseTest->save();

            return response()->json(['message' => 'Note mise à jour avec succès.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour de la note.'], 500);
        }
    }
    public function getNoteByDevId($devId)
    {
        try {
            // Vérifiez si un enregistrement existe dans la table reponse_tests pour cet ID de développeur
            $exists = ReponseTest::where('id_devp', $devId)->exists();
            
            if ($exists) {
                // Si un enregistrement est trouvé, récupérez la note et renvoyez-la
                $response = ReponseTest::where('id_devp', $devId)->first();
                return response()->json(['note' => $response->note], 200);
            } else {
                // Si aucun enregistrement n'est trouvé, renvoyez une erreur 404
                return response()->json(['error' => 'Aucune réponse de test trouvée pour ce développeur.'], 404);
            }
        } catch (\Exception $e) {
            // En cas d'erreur, renvoyez une erreur 500
            return response()->json(['error' => 'Une erreur s\'est produite lors de la récupération de la note.'], 500);
        }
    }
    
    public function getTestIdByDevId($devId)
{
    try {
        // Recherchez l'enregistrement ReponseTest pour cet ID de développeur
        $reponseTest = ReponseTest::where('id_devp', $devId)->first();
        
        if ($reponseTest) {
            // Si un enregistrement est trouvé, récupérez l'ID du test et renvoyez-le
            return response()->json(['test_id' => $reponseTest->id_test], 200);
        } else {
            // Si aucun enregistrement n'est trouvé, renvoyez une erreur 404
            return response()->json(['error' => 'Aucune réponse de test trouvée pour ce développeur.'], 404);
        }
    } catch (\Exception $e) {
        // En cas d'erreur, renvoyez une erreur 500
        return response()->json(['error' => 'Une erreur s\'est produite lors de la récupération de l\'ID du test.'], 500);
    }
}

public function countResponsesByEntrepriseId(Request $request)
{
    $testId = $request->input('test_id');  // Assurez-vous que l'ID du test est passé comme paramètre
    $entrepriseId = $request->input('compteentrepris_id'); // Assurez-vous que l'ID de l'entreprise est passé comme paramètre

    // Compter le nombre de réponses reçues pour un test spécifique et un ID d'entreprise spécifique
    $responseCount = ReponseTest::where('id_test', $testId)
                                 ->where('compteentrepris_id', $entrepriseId)
                                 ->count();

    return response()->json(['count' => $responseCount]);
}


    
}
