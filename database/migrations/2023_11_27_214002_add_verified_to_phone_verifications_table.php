<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedToPhoneVerificationsTable extends Migration
{
    public function up()
    {
        Schema::table('phone_verifications', function (Blueprint $table) {
            $table->boolean('verified')->default(false);
        });
    }

    public function down()
    {
        Schema::table('phone_verifications', function (Blueprint $table) {
            $table->dropColumn('verified');
        });
    }
}

