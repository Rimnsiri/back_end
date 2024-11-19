<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dev_skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'dev_id',
        'skill_id',
        'nbrmonth',
        'isprincipal',
        'isontop',
    ];

    public function dev()
    {
        return $this->belongsTo(Dev::class); // Assurez-vous que le modèle Cv existe et est correct
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class); // Assurez-vous que le modèle Skill existe et est correct
    }
}
