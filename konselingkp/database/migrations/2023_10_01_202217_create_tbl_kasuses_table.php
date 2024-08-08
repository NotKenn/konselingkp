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
        Schema::create('tbl_kasus', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Students::class);
            $table->date('tglKasus');
            $table->string('penjelasan');
            $table->string('penanganan');
            $table->string('kelas');
            $table->string('penanganKasus');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kasus');
    }
};
