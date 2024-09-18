<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstname',
        'presentation',
        'email',
        'phone',
        'address',
        'photo',
        'note',
        'comptedev_id'
    ];
    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }

    // Dev.php
    public function comptedev() {
        return $this->belongsTo(Comptedev::class, 'comptedev_id','id');
    }
public function messages()
{
    return $this->hasMany(ContactDev::class);
}
}
