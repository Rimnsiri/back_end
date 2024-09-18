<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Compteentrepri;
use App\Models\ContactDev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CompteentrepriController extends Controller
{
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'domaine' => 'required|string',
            'email' => 'required|string|email|max:255|unique:compteentrepris',
            'password' => 'required|min:6',
            'confirmepassword' => 'required|same:password', 
        ]);

      
        $compteentrepri = Compteentrepri::create([
            'nom' => $validatedData['nom'],
            'domaine' => $validatedData['domaine'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
            'confirmepassword' => bcrypt($validatedData['password']), 
        ]);

       
        return response()->json(['message' => 'Compte entreprise enregistré avec succès'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Récupération email et password  de connexion depuis la requête
        $credentials = $request->only('email', 'password');
    
        // bch n3ml  l'authentification
        if (Auth::guard('compteentrepri')->attempt($credentials)) {
            
            $user = Auth::guard('compteentrepri')->user(); 
            return response()->json([
                'message' => 'Connexion réussie',
                'compteentrepri_id' => $user->id,
                'email' => $user->email, 
            ], 200);
        } else {
            // Authentification ma tmchych 
            return response()->json(['message' => 'Email ou mot de passe incorrect'], 401);
        }
    }
    
    public function entrepriDetails($id)
    {

        $entreprise = Compteentrepri::find($id);
    
        if (!$entreprise) {
            return response()->json(['message' => 'Détails de l\'entreprise introuvables'], 404);
        }
    
        return response()->json($entreprise);
    }
    

    public function updatePassword(Request $request)
    {
        
        $validatedData = $request->validate([
            'compteentrepri_id' => 'required', 
            'password' => 'required|min:6',
            'confirmepassword' => 'required|same:password',
        ]);
    
        // nlawej  a3la compte  l'entreprise
        $compteentrepri = Compteentrepri::find($validatedData['compteentrepri_id']);
    
        // Vérifiez est ce que  compte entreprise mawjoud wele 
        if (!$compteentrepri) {
            return response()->json(['message' => 'Compte entreprise introuvable'], 404);
        }
    
        // Mettez à jour 3amek password 
        $compteentrepri->update([
            'password' => bcrypt($validatedData['password']),
            'confirmepassword' => bcrypt($validatedData['confirmepassword']),
        ]);
    
       
        return response()->json(['message' => 'Mot de passe mis à jour avec succès'], 200);
    }
    
    
    
    public function deleteAccountentrepri(Request $request)
{
   
    $validatedData = $request->validate([
        'compteentrepri_id' => 'required', 
        'password' => 'required', 
    ]);

    // nlawej 3la compte  développeur
    $compteentrepri = Compteentrepri::find($validatedData['compteentrepri_id']);

    // Vérifier est ce que mon password shih wele 
    if (Hash::check($validatedData['password'], $compteentrepri->password)) {
       
        $compteentrepri->delete();
        return response()->json(['message' => 'Compte  supprimés avec succès'], 200);
    } else {
        
        return response()->json(['message' => 'Mot de passe incorrect'], 401);
    }
}

public function getMessages(Request $request, $email)
{
    
    $messages = ContactDev::where('email', $email)
    ->whereNotNull('response') 
    ->where('status', 'approved')
    ->get();
    return response()->json($messages);
}


public function addResponse(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'response' => 'required|string',
    ]);

    // Récupérer le message existant de l'entreprise
    $existingMessage = DB::table('contactdevs')
        ->where('email', $validatedData['email'])
        ->value('message');

    // Ajouter la nouvelle réponse à la suite du message existant
    $newMessage = $existingMessage . ' || ' . $validatedData['response'];

    // Mettre à jour le champ message avec le nouveau message
    DB::table('contactdevs')
        ->where('email', $validatedData['email'])
        ->update(['message' => $newMessage]);

    return response()->json(['message' => 'Réponse ajoutée avec succès'], 201);
}




}
