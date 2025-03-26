<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa');
            $table->foreignId('id_kaprodi')->constrained('dosen');
            $table->foreignId('id_manager_tu')->constrained('dosen');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('keperluan')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
