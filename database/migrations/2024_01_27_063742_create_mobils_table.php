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
        Schema::create('mobils', function (Blueprint $table) {
            $table->increments('ID_Mobil');
            $table->string('Nomor_Polisi', 50);
            $table->string('Nomor_Lambung', 50)->unique();
            $table->string('Pemilik', 50);
            $table->string('Nomor_Seri', 50);
            $table->string('Nomor_Rangka', 50);
            $table->string('Nomor_Mesin', 50);
            $table->date('Tanggal_Masuk');
            $table->date('Tanggal_Keluar');
            $table->string('Berkas_Pendukung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
