<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'car_id',
        'start_location',
        'end_location',
        'date',
        'time',
        'seats_available',
        'price_per_seat'
    ];
}
