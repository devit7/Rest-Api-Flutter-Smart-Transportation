<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bus');
            $table->unsignedBigInteger('id_halte');
            $table->dateTime('waktuBerangkat');
            $table->timestamps();

            $table->foreign('id_bus')->references('id')->on('bus')->onDelete('cascade');
            $table->foreign('id_halte')->references('id')->on('halte')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
