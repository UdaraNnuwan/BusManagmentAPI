<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class bus extends Model
{
    use HasApiTokens;
    protected $table='buses';
    protected $fillable=[
        'name',
        'type',
        'vehical_number',
    ];

}
