<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Ajoutez ces deux lignes
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

// Assurez-vous que votre modèle implémente AuthenticatableContract
class Comptedev extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable; // Utilisez le trait Authenticatable ici

    protected $fillable = [
        'nom',
        'prénom',
        'email',
        'password',
        'confirmepassword',
    ];

    // Cacher le mot de passe lors de la conversion du modèle en tableau ou JSON
    protected $hidden = [
        'password',
        'remember_token', // Assurez-vous d'avoir cette colonne dans votre base de données
    ];
    // Comptedev.php
public function devInfo() {
    return $this->hasOne(Dev::class, 'comptedev_id');
}

}
