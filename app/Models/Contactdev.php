<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactdev extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'dev_id',
        'response',   
        'response_time'
    ];

    public function dev()
    {
        return $this->belongsTo(Dev::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Compteentrepri::class, 'email', 'email');
    }
}
