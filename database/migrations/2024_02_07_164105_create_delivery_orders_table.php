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
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id();
            $table->string('NO_Do')->unique();
            $table->date('Tanggal_Do');
            $table->string('Nomor_Polisi');
            $table->string('Nomor_Lambung');
            $table->string('SJB_Muat');
            $table->string('SJB_Bongkar');
            $table->string('ID_Rute');
            $table->double('Tonase');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_orders');
    }
};
