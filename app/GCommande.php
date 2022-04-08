<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GCommande extends Model
{

    protected $with = [
        'reservations'
    ];

    public function reservations()
    {
        return $this->hasMany(GReservation::class,'demande_id','id');
    }
}
