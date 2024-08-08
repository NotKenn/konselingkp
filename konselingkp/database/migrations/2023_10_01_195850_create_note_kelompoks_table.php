<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('noteKelompok', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('targetKonselingKelompok');
            $table->date('tglRencanaPelaksanaa');
            $table->string('materi');
            $table->date('tglRealisasiPelaksanaan');
            $table->string('evaluasiProses');
            $table->string('evaluasiAkhir');
            $table->string('status');
            $table->string('descHambatan');
            $table->string('descAltSolusi');
            $table->string('descRTL');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noteKelompok');
    }
};
