<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = ['title', 'description', 'user_id', 'genre', 'price', 'image', 'start_time', 'end_time'];



    // Define an accessor for the image column to return image URLs if needed
    public function getImageAttribute($value)
    {
        // Assuming you store only the image filename in the database
        return asset('storage/images/' . $value);
    }
}   