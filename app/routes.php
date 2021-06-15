<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class routes extends Model
{
    protected $table='routes';
    protected $fillable=[
        'node_one',
        'node_two',
        'route_number',
        'distance',
        'time',
        
    ];
}
