<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'compteentrepris_id',
        'nom', 
        'description',
         'duree_estimee', 
         'categorie', 
         'niveau', 
         'fichier_pdf',
          'company_password', 
          'statut'
    ];

 
    public $timestamps = true;
    public function getPDFPathAttribute()
    {
        // Vérifiez si le fichier PDF existe en tant que données BLOB
        if (!empty($this->fichier_pdf)) {
            // Si oui, renvoyez une URL vers une route de téléchargement du PDF
            return route('tests.downloadPDF', $this->id);
        } else {
            // Sinon, renvoyez null ou une chaîne vide, ou tout autre valeur par défaut
            return null;
        }
    }
    
}
