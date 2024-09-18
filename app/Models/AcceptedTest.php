<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptedTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'compteentrepris_id',
        'nom',
        'description',
        'duree_estimee',
        'categorie',
        'niveau',
        'fichier_pdf',
        'company_password',
      
    ];
    public function reponses()
    {
        return $this->hasMany(ReponseTest::class, 'id_test', 'id');
    }
    
}

