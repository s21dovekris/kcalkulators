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
        Schema::create('produkts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nosaukums', 45);
            $table->string('mervieniba');
            $table->smallInteger('kaloritate');
            $table->string('kategorija');
            $table->boolean('vegan');
            $table->string('alergija');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkts');
    }
};
