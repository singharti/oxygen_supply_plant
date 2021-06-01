<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cylinder extends Model
{
    protected $table = 'cylinders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','ltr','quantity'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
