<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Compteentrepri extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'compteentrepri';

    protected $fillable = [
        'nom',
        'domaine',
        'email',
        'password',
        'confirmepassword',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    // Si vous utilisez Laravel 8 ou une version supérieure, assurez-vous que la méthode boot() est présente dans le modèle.

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function messages()
    {
        return $this->hasMany(ContactDev::class, 'email', 'email'); 
    }
}
