<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function city()
    {
        return $this->hasOne(City::class,'state_id','id');
    }
}
