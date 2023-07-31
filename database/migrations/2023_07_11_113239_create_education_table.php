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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->longText('faliyetin_adi')->nullable();
            $table->string('faliyetin_tipi')->nullable();
            $table->string('is_birligi')->nullable();
            $table->string('faliyetin_butcesi')->nullable();
            $table->date('baslangic_tarihi')->nullable();
            $table->date('bitis_tarihi')->nullable();
            $table->text('hedef_kitlesi')->nullable();
            $table->string('hedef_kitle_sayisi')->nullable();
            $table->string('faliyeti_gerceklestiren_personel')->nullable();
            $table->longText('faliyetin_kisa_aciklamasi')->nullable();
            $table->text('temel_alani')->nullable();
            $table->timestamps();


            $table->unsignedBigInteger('kys_olcutu')->nullable();
            $table->foreign('kys_olcutu')->references('id')->on('kys_codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
