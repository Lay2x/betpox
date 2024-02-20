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
        Schema::create('lokasi', function (Blueprint $table) {
            $table->increments('id_lokasi');
            $table->string('alamat_lokasi');
            $table->string('qr_lokasi');
            $table->double('long_lokasi');
            $table->double('lat_lokasi');
            $table->integer('id_kota');
            $table->integer('id_provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi');
    }
};
