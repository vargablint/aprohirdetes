<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vasarlasok', function (Blueprint $table) {
            $table->id('vasarlasok_id');
            $table->foreignId('vevo_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('hirdetesek_id')->constrained('hirdetesek')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['függőben', 'befejezett', 'törölve'])->default('függőben');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vasarlasok');
    }
};
