<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus_schedule extends Model
{
    protected $table='bus_schedules';
    protected $fillable=[
        'bus_route_id',
        'direction',
        'start_timestamp',
        'end_timestamp',        
    ];
}
