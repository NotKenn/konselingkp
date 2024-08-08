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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('NISN');
            $table->string('Nama');
            $table->string('tempatLahir');
            $table->date('tglLahir');
            $table->string('noHP');
            $table->string('Alamat');
            $table->string('statusKeaktifanSiswa');
            $table->string('namaAyah');
            $table->string('noHPAyah');
            $table->string('pekerjaanAyah');
            $table->string('alamatAyah');
            $table->string('isAyahAlive');
            $table->string('namaIbu');
            $table->string('noHPIbu');
            $table->string('pekerjaanIbu');
            $table->string('alamatIbu');
            $table->string('isIbuAlive');
            $table->string('statusMaritalOrtu');
            $table->string('isTinggalBersamaOrtu');
            $table->string('namaWali');
            $table->string('noHPWali');
            $table->string('pekerjaanWali');
            $table->string('alamatWali');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
