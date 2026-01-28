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
        Schema::create('akun_keuangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_akun');
            $table->enum('jenis', ['tunai', 'bank', 'wallet']);
            $table->decimal('saldo_awal', 15, 2)->default(0);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_keuangans');
    }
};
