<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'movie_id', 'room_id'];

    // Define the relationship with the Movie model
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    // Define the relationship with the Room model
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
