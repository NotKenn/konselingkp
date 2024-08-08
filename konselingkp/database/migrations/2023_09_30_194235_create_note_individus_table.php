<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Students;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('noteIndividu', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Students::class);
            $table->string('konselingSebelumnya');
            $table->string('isNew');
            $table->string('jenisKonseling');
            $table->date('tglKonseling');
            $table->string('deskripsiMasalah');
            $table->string('tindakan');
            $table->string('catatan');
            $table->string('rencanaTindakLanjut');
            $table->date('tglRTL');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noteIndividu');
    }
};
