<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];
    public function exps()
    {
         return $this->belongsToMany(Experience::class, 'experience_skill', 'skill_id', 'exp_id');
    }
    public function cv()
    {
        return $this->belongsToMany(Cv::class, 'Cv_skill')->withPivot('nbrmonth', 'isprincipal');
    }
  
}
