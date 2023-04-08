<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ride_id',
        'passenger_id',
        'status'
    ];
}
