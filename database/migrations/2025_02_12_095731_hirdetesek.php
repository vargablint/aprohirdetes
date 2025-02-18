<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hirdetesek', function (Blueprint $table) {
            $table->id('hirdetesek_id');
            $table->foreignId('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('kategoria_id')->references('kategoria_id')->on('kategoriak')->onDelete('cascade');
            $table->string('title');
            $table->text('leiras');
            $table->decimal('ar', 10, 2);
            $table->enum('status', ['aktiv', 'eladva', 'lejart'])->default('aktiv');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hirdetesek');
    }
};