<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('genre');
            $table->decimal('price', 8, 2);
            $table->string('image'); 
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}

