<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'entreprisename',
        'startdate',
        'enddate',
        'description',
        'cv_id',
        'is_current',
    ];
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'experience_skill');
    }
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
