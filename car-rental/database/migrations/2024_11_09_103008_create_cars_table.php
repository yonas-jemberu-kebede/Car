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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();

            $table->string('make');
            $table->string('model',100)->change();
            $table->unsignedBigInteger('year');
            $table->string('color');
            $table->string('license_plate')->unique();
            $table->enum('status', ['Available', 'Rented', 'Maintenance']);
            $table->decimal('rental_price_per_day',8,2);
            $table->enum('fuel_type', ['Petrol', 'Diesel', 'Electric']);
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};