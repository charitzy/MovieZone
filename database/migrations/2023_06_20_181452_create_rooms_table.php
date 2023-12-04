<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room');
            $table->integer('seats');
            $table->foreignId('movie_id')->constrained('movies');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
