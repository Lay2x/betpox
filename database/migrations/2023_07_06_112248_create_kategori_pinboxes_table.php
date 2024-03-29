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
        Schema::create('kategori_pinbox', function (Blueprint $table) {
            $table->increments('id_kategori_pinbox');
            $table->string('nama_kategori_pinbox');
            $table->string('ukuran_kategori_pinbox');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_pinbox');
    }
};
