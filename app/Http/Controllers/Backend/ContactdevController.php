<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactdev;
use App\Mail\DataAddedMail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Mail;
use App\Models\Dev; 
class ContactdevController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'dev_id' =>'nullable',
            // Ajoutez d'autres champs ici selon votre modèle
        ]);
    
        // Vérifier si un enregistrement existe déjà pour cette adresse e-mail
        $existingMessage = ContactDev::where('email', $validatedData['email'])->first();
    
        // Si un enregistrement existe déjà, ajoutez simplement le nouveau message à la suite
        if ($existingMessage) {
            $existingMessage->message .= "\n" . $validatedData['message'];
            $existingMessage->save();
        } else {
            
            ContactDev::create($validatedData);
        }
        $developer = Dev::find($validatedData['dev_id']);

        if ($developer) {
            $devName = $developer->name;
            $devFirstName = $developer->firstname;
        } else {
            $devName = 'Inconnu';
            $devFirstName = '';
        }
    
        $emailData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
            'dev_id' => $validatedData['dev_id'],
            'dev_name' => $devName,
            'dev_firstname' => $devFirstName,
        ];
    
        
        Mail::to('ralph@silog.io')->send(new DataAddedMail($emailData));
        return response()->json(['message' => 'Message sent successfully'],201);
    }
    public function reject(Request $request, $id)
    {
        $contact = Contactdev::findOrFail($id);
        $contact->status = 'rejected';
        $contact->save();

        return response()->json(['message' => 'Message rejected successfully'], 200);
    }
    public function approve(Request $request, $id)
    {
        $contact = Contactdev::findOrFail($id);
        $contact->status = 'approved';
        $contact->save();

        return response()->json(['message' => 'Message approved successfully'], 200);
    }
    public function index(Request $request)
    {
        $dev_id = $request->dev_id;  
        $messages = ContactDev::where('dev_id', $dev_id)
        ->where('status', 'approved')
        ->orderBy('created_at')
        ->get();

        return response()->json($messages);
    }
    public function respond(Request $request, $id)
    {
        // Valider la réponse
        $validatedData = $request->validate([
            'response' => 'required|string',
        ]);
    
        $contact = ContactDev::findOrFail($id);
        $currentResponse = $contact->response;
    
      
        $newResponse = $currentResponse ? $currentResponse . "\n" . $validatedData['response'] : $validatedData['response'];
        $contact->response = $newResponse;
        $contact->response_time = now();  
        $contact->save();
    
        return response()->json(['message' => 'Response recorded successfully'], 200);
    }
    
    
    
    


    public function dashboard()
{
    $contacts = Contactdev::all();
    return view('dashboard', compact('contacts'));
}
public function countMessagesByDeveloper($dev_id)
{
    $messageCount = ContactDev::where('dev_id', $dev_id)->count();

    return response()->json(['total_messages' => $messageCount], 200);
}
public function countResponsesByDeveloper($dev_id)
{
    // Compter seulement les messages qui ont une réponse
    $responseCount = ContactDev::where('dev_id', $dev_id)
                               ->whereNotNull('response')  // Filtre pour inclure seulement les entrées avec une réponse non nulle
                               ->count();

    return response()->json(['total_responses' => $responseCount], 200);
}


}
