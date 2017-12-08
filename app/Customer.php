<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

}
