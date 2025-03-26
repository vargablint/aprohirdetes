<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vasarlasok', function (Blueprint $table) {
            $table->id('vasarlasok_id');
            $table->foreignId('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreignId('hirdetesek_id')->references('hirdetesek_id')->on('hirdetesek')->onDelete('cascade');
            $table->enum('status', ['fuggoben', 'befejezett', 'torolve'])->default('fuggoben');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vasarlasok');
    }
};
