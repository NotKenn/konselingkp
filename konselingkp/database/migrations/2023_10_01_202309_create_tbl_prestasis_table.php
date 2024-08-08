<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Students;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Students::class);
            $table->date('tglPrestasi');
            $table->string('namaPrestasi');
            $table->string('tingkatPrestasi');
            $table->string('kelas');
            $table->string('peringkatPrestasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_prestasi');
    }
};
