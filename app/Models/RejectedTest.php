<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectedTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'compteentrepris_id',
        'nom',
        'description',
        'duree_estimee',
        'categorie',
        'niveau',
    ];
}
