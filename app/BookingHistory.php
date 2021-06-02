<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    protected $table = 'booking_history';
    protected $fillable = [
        'consumer_id',
        'supplier_id',
        'covid_19',
        'date_covid_19',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'consumer_id','id');
    }
}
