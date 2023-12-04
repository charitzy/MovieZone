<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'room',
        'date',
        'time',
        'price',
        'user_id',
        'schedule_id',
    ];

    // Define any relationships or additional methods as needed
}
