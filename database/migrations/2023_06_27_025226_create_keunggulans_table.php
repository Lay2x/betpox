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
        Schema::create('keunggulan', function (Blueprint $table) {
            $table->increments('id_keunggulan');
            $table->string('judul_keunggulan');
            $table->string('icon_keunggulan');
            $table->text('deskripsi_keunggulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keunggulan');
    }
};
