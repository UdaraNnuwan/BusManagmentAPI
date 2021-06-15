<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus_schedule_booking extends Model
{
    protected $table='bus_schedule_bookings';
    protected $fillable=[
        'seat_number',
        'price',
        'availability',
        'bus_id',
        'status',
  
   ];
}
