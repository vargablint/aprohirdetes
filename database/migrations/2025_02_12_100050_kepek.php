<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kepek', function (Blueprint $table) {
            $table->id('kepek_id');
            $table->foreignId('hirdetesek_id')->constrained('hirdetesek')->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kepek');
    }
};