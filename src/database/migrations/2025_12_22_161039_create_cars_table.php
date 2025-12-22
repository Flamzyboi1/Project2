<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('car_name');
        $table->string('model');
        
        $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

    
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
