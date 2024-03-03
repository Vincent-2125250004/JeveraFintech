<?php

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Pengeluaran::class)->nullable()->default(null)->references('id')->on('pengeluarans')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(Pemasukan::class)->nullable()->default(null)->references('id')->on('pemasukans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('Dari_Akun');
            $table->foreign('Dari_Akun')->references('id')->on('akuns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('Ke_Akun');
            $table->foreign('Ke_Akun')->references('id')->on('akuns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Transaksi');
            $table->string('Nomor_Referensi');
            $table->bigInteger('Sisa_Saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldos');
    }
};
