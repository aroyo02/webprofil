<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('foto_kepala_sekolah')->nullable(); 
            $table->text('sambutan_kepsek')->nullable(); 
            $table->string('motto')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
