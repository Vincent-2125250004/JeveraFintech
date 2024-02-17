<?php

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
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
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pengeluaran::class);
            $table->foreignIdFor(Pemasukan::class);
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
