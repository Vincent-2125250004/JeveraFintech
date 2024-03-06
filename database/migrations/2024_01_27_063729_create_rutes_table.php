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
        Schema::create('rutes', function (Blueprint $table) {
            $table->id();
            $table->string('Asal_Rute');
            $table->string('Tujuan_Rute');
            $table->string('Gerbang');
            $table->double('Kilometer_Rute');
            $table->bigInteger('Harga_Tonase');
            $table->bigInteger('Uang_Jalan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutes');
    }
};
