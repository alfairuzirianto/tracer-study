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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->boolean('mengisi_tracer')->default(false);
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->string('alamat');
            $table->string('program_studi');
            $table->year('tahun_masuk');
            $table->year('tahun_lulus');
            $table->decimal('ipk', 3, 2);
            $table->string('nomor_ijazah')->unique();
            $table->string('foto_ijazah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};