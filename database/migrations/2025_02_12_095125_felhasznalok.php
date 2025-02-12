<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('felhasznalok', function (Blueprint $table) {
            $table->id('felhasznalo_id');
            $table->string('nev');
            $table->string('email')->unique();
            $table->string('jelszo');
            $table->string('tel_szam')->nullable();
            $table->text('tartozkodasi_hely')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('felhasznalok');
    }
};