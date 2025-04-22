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
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['Tenda', 'Tas', 'Tracking Pole', 'Sleeping Bag', 'Matras', 'dan lainnya'])->nullable();
            $table->integer('harga_sewa');
            $table->integer('ketersediaan');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alats');
    }
};
