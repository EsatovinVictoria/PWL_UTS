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
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id');

            $table->foreignId('penjualan_id')
                ->constrained('t_penjualan', 'penjualan_id')
                ->cascadeOnDelete();

            $table->foreignId('barang_id')
                ->constrained('m_barang', 'barang_id');

            $table->integer('harga');
            $table->integer('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};
