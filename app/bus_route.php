<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus_route extends Model
{
    protected $table='bus_routes';
    protected $fillable=[
        'bus_id',
        'route_id',
        'status',
  
   ];
}
