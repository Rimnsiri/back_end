<?php

// app/Models/Enregistest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enregistest extends Model
{
    protected $fillable = ['developerEmail', 'developerPassword', 'developer_id', 'test_id'];

    public function developer()
    {
        return $this->belongsTo(Comptedev::class, 'developer_id');
    }
   
}
