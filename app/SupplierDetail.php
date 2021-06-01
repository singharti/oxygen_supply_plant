<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierDetail extends Model
{
    protected $table = 'supplier_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','business_name'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
