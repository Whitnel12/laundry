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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            // $table->string('nama_pesanan');
            $table->foreignId('paket_id')->constrained('paket')->onDelete('cascade');
            $table->foreignId( 'user_id')->constrained()->onDelete('cascade');
            // $table->foreignId( 'promo_id')->constrained('promo')->onDelete('cascade');
            $table->foreignId('promo_id')->nullable()->constrained('promo')->onDelete('cascade'); // Menjadikan promo_id nullable
            // $table->string('nama_pelanggan');
            $table->string('status_pesanan');
            $table->decimal('berat');
            $table->decimal('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
