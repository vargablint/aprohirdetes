<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kepek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hirdetesek_id');
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('hirdetesek_id')->references('hirdetesek_id')->on('hirdetesek')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kepek');
    }

    
};