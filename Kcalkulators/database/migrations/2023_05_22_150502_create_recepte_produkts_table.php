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
        Schema::create('recepte_produkts', function (Blueprint $table) {
            $table->foreignId('recepte_id')->constrained('receptes')->onDelete('cascade');
            $table->foreignId('produkt_id')->constrained('produkts')->onDelete('cascade');
            $table->decimal('svars', 5, 2);
    
            $table->timestamps();
    
            $table->primary(['recepte_id', 'produkt_id']);
        });
    }

    /**  
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepte_produkts');
    }
};
