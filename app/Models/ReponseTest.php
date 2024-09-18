<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponseTest extends Model
{
    use HasFactory;

    protected $fillable = [
     'reponse', 
     'start_time',
     'end_time', 
     'id_test', 
     'id_devp',
    'compteentrepris_id',
    'note'
];
public function acceptedTest()
{
    return $this->belongsTo(AcceptedTest::class, 'id_test', 'id');
}
public function dev()
{
    return $this->belongsTo(Dev::class, 'id_devp', 'id');
}

}