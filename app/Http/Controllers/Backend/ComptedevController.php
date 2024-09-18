<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comptedev;
use App\Models\Dev;
use Illuminate\Support\Facades\Hash;
class ComptedevController extends Controller
{

    public function register(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prénom' => 'required|string',
            'email' => 'required|email|unique:comptedevs',
            'password' => 'required|min:6',
            'confirmepassword' => 'required|same:password', // Vérifie que confirmepassword est égal à password
        ]);

        // Créer un nouvel utilisateur
        $comptedev = Comptedev::create([
            'nom' => $validatedData['nom'],
            'prénom' => $validatedData['prénom'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Utiliser bcrypt pour sécuriser le mot de passe
            'confirmepassword' => bcrypt($validatedData['password']), // Utiliser la même valeur que password
        ]);

        // Répondre avec une réponse JSON
        return response()->json(['message' => 'Compte dev enregistré avec succès'], 201);
    }

// ComptedevController.php - Méthode login

public function login(Request $request)
{
    // Valider les données de la requête
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tentative de connexion avec le guard comptedev
    if (Auth::guard('comptedev')->attempt($validatedData)) {
        $user = Auth::guard('comptedev')->user();
        
        // Trouver le dev correspondant en utilisant le comptedev_id
        $dev = Dev::where('comptedev_id', $user->id)->first();

        // Vérifier si le développeur a un profil dans la table 'devs'
        $hasProfile = $dev !== null;

        // Retourner la réponse avec indication si l'utilisateur a un profil
        return response()->json([
            'message' => 'Connexion réussie',
            'comptedev_id' => $user->id,
            'dev_id' => $dev ? $dev->id : null, // Ajouter cette ligne pour renvoyer le dev_id
            'has_profile' => $hasProfile,
        ], 200);
    } else {
        // Échec de connexion
        return response()->json(['message' => 'Identifiants invalides'], 401);
    }
}

public function changePassword(Request $request)
{
    // Valider les données de la requête
    $validatedData = $request->validate([
        'comptedev_id' => 'required', // Vous devez connaître l'ID du développeur dont vous souhaitez changer le mot de passe
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
    ]);

    // Trouvez le compte du développeur
    $comptedev = Comptedev::find($validatedData['comptedev_id']);

    // Mettez à jour le mot de passe
    $comptedev->update([
        'password' => bcrypt($validatedData['password']),
        'confirm_password' =>bcrypt($validatedData['confirm_password']),
    ]);

    // Répondez avec une réponse JSON
    return response()->json(['message' => 'Mot de passe mis à jour avec succès'], 200);
}

public function deleteAccount(Request $request)
{
    // Valider les données de la requête
    $validatedData = $request->validate([
        'comptedev_id' => 'required', // ID du compte à supprimer
        'password' => 'required', // Mot de passe pour la vérification
    ]);

    // Trouver le compte du développeur
    $comptedev = Comptedev::find($validatedData['comptedev_id']);

    // Vérifier si le mot de passe est correct
    if (Hash::check($validatedData['password'], $comptedev->password)) {
        // Supprimer le compte du développeur
        $comptedev->delete();

        // Supprimer le profil du développeur s'il existe
        $dev = Dev::where('comptedev_id', $comptedev->id)->first();
        if ($dev) {
            $dev->delete();
        }

        // Répondre avec une réponse JSON
        return response()->json(['message' => 'Compte et profil supprimés avec succès'], 200);
    } else {
        // Si le mot de passe est incorrect, renvoyer un message d'erreur
        return response()->json(['message' => 'Mot de passe incorrect'], 401);
    }
}

    
    
}
