<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus_seat extends Model
{
    protected $table='bus_seats';
    protected $fillable=[
        'seat_number',
        'price',
        'bus_id',
        'availability',
    ];
}