<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('genre');
            $table->string('room');
            $table->date('date');
            $table->string('time');
            $table->decimal('price', 8, 2);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
