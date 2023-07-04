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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('kys_olcutu')->nullable();
            $table->longText('proje_adi')->nullable();
            $table->string('destek_alinan_kurum')->nullable();
            $table->string('cagri_tipi')->nullable();
            $table->string('proje_no')->nullable();
            $table->string('proje_butcesi')->nullable();
            $table->date('baslangic_tarihi')->nullable();
            $table->date('bitis_tarihi')->nullable();
            $table->string('is_birligi')->nullable();
            $table->string('arastirmacilar')->nullable();
            $table->longText('proje_aciklama')->nullable();
            $table->longText('temel_alani')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
