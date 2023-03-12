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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignID('outlet_id');
            $table->foreignID('customer_id');
            $table->foreignID('paket_id');
            $table->foreignID('user_id');
            $table->string('id_invoice')->nullable();
            $table->datetime('tgl');
            $table->datetime('tgl_bayar');
            $table->decimal('berat')->nullable();
            $table->decimal('biaya_tambahan')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('diskon')->nullable();
            $table->enum('status', ['proses','selesai','diambil']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
