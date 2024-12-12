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
        Schema::create('jenis_paket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis');
            $table->integer('waktu_pengerjaan');
            $table->integer('potongan_harga');
            $table->integer('biaya_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_paket');
    }
};