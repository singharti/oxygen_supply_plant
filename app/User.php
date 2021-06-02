<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'gender',
        'age',
        'aadhar_card_number',
        'identity_proof',
        'address',
        'phone_number',
        'account_type',
        'state',
        'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function supplierDetail()
    {
        return $this->hasOne(SupplierDetail::class,'user_id','id');
    }

    public function cylinder()
    {
        return $this->hasMany(Cylinder::class,'user_id','id');
    }

    public function bookingHistory()
    {
        return $this->hasOne(BookingHistory::class,'consumer_id','id');
    }
}
