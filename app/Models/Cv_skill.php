<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv_skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'cv_id',
        'skill_id',
        'nbrmonth',
        'isprincipal',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class); // Assurez-vous que le modèle Cv existe et est correct
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class); // Assurez-vous que le modèle Skill existe et est correct
    }
}
