<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('galeri_pustakas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('penulis');
        $table->string('penerbit');
        $table->year('tahun_terbit');
        $table->integer('stok');
        $table->string('sampul'); // nama file gambar
        $table->text('deskripsi');
        $table->string('kategori'); // contoh: Fiksi, Non-fiksi, Pelajaran, dll
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_pustakas');
    }
};
