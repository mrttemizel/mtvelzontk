<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->default(DB::raw('(UUID())'))->index();


            $table->integer('etkinlik_teması')->nullable();
            $table->string('etkinlik_basligi')->nullable();
            $table->string('amac')->nullable();
            $table->string('duzenleyen_birimi')->nullable();
            $table->string('sorumlu_kisiler')->nullable();
            $table->string('katki_saglayan_birimler')->nullable();
            $table->string('dis_paydaslar')->nullable();
            $table->string('katilimci_kitle')->nullable();
            $table->string('katilimci_sayisi')->nullable();
            $table->date('baslangic_tarihi')->nullable();
            $table->date('bitis_tarihi')->nullable();
            $table->string('etkinlik_yeri')->nullable();
            $table->string('planlanan_butce')->nullable();
            $table->string('gerceklenen_butce')->nullable();
            $table->integer('gerceklesme_durumu')->nullable();
            $table->longText('aciklama')->nullable();
            $table->string('belge')->nullable();
            $table->string('resim')->nullable();


            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
