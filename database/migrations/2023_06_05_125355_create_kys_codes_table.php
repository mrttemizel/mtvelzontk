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
        Schema::create('kys_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code_name');
            $table->longText('code_description');
            $table->timestamps();

            $table->unsignedBigInteger('kyscategory_id')->nullable();
            $table->foreign('kyscategory_id')->references('id')->on('kys_categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kys_codes');
    }
};
