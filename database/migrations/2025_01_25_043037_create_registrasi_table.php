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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->unsignedBigInteger('id_agama'); // Ubah jenis data menjadi unsignedBigInteger
            $table->unsignedBigInteger('id_buku'); // Ubah jenis data menjadi unsignedBigInteger
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('id_agama')->references('id')->on('agama');
            $table->foreign('id_buku')->references('id')->on('buku');
            // Tambahkan foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
