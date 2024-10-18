<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'firstname',
        'title',
        'description',
        'email',
        'phone',
        'address',
        'tjm',
        'niveau',
        'dev_id', 
        'french_level', 
        'english_level',
        'photo',
        'ispublic',
    ];
   
    public function dev()
    {
        
        return $this->belongsTo(Dev::class, 'dev_id'); 
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function skills() {
        // Assurez-vous que le nom de la table pivot est correct
        return $this->belongsToMany(Skill::class, 'cv_skills')->withPivot('nbrmonth', 'isprincipal','isontop');
    }
}
