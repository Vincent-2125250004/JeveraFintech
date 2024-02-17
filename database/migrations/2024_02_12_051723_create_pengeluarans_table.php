<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('Nomor_Referensi')->unique();
            $table->string('Nama_Kontak')->unique();
            $table->foreign('Nama_Kontak')->references('Nama_Kontak')->on('kontaks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Dari_Akun');
            $table->foreign('Dari_Akun')->references('Nama_Akun')->on('akuns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Ke_Akun');
            $table->foreign('Ke_Akun')->references('Nama_Akun')->on('akuns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('Nominal_Pengeluaran');
            $table->date('Tanggal_Pengeluaran');
            $table->string('Deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
