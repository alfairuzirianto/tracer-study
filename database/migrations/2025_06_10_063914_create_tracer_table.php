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
        Schema::create('tracer', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->foreign('nim')->references('nim')->on('alumni')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('status');
            $table->integer('waktu_tunggu');
            $table->string('nama_instansi');
            $table->string('kota_instansi');
            $table->string('alamat_instansi');
            $table->string('jenis_instansi');
            $table->string('jabatan');
            $table->integer('pendapatan')->default(0);
            $table->string('keselarasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer');
    }
};
