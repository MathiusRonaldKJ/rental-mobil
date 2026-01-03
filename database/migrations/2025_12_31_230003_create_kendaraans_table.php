<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan'); // penumpang atau barang
            $table->string('nama_kendaraan');
            $table->text('deskripsi')->nullable();
            $table->integer('kapasitas'); // dalam orang atau ton
            $table->string('satuan_kapasitas'); // orang atau ton
            $table->decimal('harga_sewa', 10, 2);
            $table->boolean('status')->default(true); // true = tersedia
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};