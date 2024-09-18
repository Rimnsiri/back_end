<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'diplome',
        'école', 
        'description',
        'startdate',
        'enddate',
        'cv_id'
    ];

    protected $dates = ['startdate', 'enddate'];

    public function getFormattedStartDateAttribute()
    {
        return $this->startdate ? Carbon::parse($this->startdate)->format('d/m/Y') : 'N/A';
    }

    public function getFormattedEndDateAttribute()
    {
        return $this->enddate ? Carbon::parse($this->enddate)->format('d/m/Y') : 'N/A';
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
