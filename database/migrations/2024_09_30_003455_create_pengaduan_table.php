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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 225);  // Nama Pengadu
            $table->string('nik', 16);  // NIK (Nomor Induk Kependudukan)
            $table->date('tanggal_lahir');  // Tanggal Lahir
            $table->integer('umur');  // Umur Pengadu
            $table->string('username', 100)->unique();  // Username untuk login
            $table->string('email', 100)->unique();  // Email untuk autentikasi
            $table->string('password');  // Password terenkripsi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
