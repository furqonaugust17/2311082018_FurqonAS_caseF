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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->char('nomor_meja');
            $table->integer('jumlah_orang');
            $table->date('tanggal_reservasi');
            $table->time('waktu_reservasi');
            $table->text('catatan_khusus')->nullable();
            $table->enum('status', ['terjadwal', 'hadir', 'dibatalkan'])->default('terjadwal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
