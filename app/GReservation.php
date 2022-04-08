<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GReservation extends Model
{
    protected $with = [
        'user'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function commande(){
        return $this->hasOne(GCommande::class,'id','demande_id');
    }
}
