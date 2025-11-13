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
            $table->string('nim')->unique();
            $table->string('nama');
            $table->enum('fakultas', ['FTI', 'FIK', 'FEB', 'STIT']);
            $table->enum('jurusan', [
                'Teknik Industri', 'Teknik Kimia', // FTI
                'Teknik Informatika', 'Manajemen Informatika', // FIK
                'Manajemen', 'Akuntansi', 'Bisnis Digital', // FEB
                'Pendidikan Agama', 'PAUD' // STIT
            ]);
            $table->timestamps();
        });
    }
};

