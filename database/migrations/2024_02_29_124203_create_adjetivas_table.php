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
        Schema::create('adjetivas', function (Blueprint $table) {
            $table->id();
            $table->string('Nomor_Referensi')->unique();
            $table->string('Nama_Kontak');
            $table->foreign('Nama_Kontak')->references('Nama_Kontak')->on('kontaks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('Dari_Akun');
            $table->foreign('Dari_Akun')->references('id')->on('akuns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('Ke_Akun');
            $table->foreign('Ke_Akun')->references('id')->on('akuns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('Nominal_Adjetiva');
            $table->date('Tanggal_Adjetiva');
            $table->string('Deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjetivas');
    }
};
