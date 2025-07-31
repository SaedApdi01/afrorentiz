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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Property owner
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->double('price');
            $table->enum('property_type', ['Villa', 'Apartment', 'Condo' ,'House', 'Studio', 'Office'])->default('Apartment');
            $table->enum('listing_type', ['rent', 'sale'])->default('sale');

            // Location
            $table->string('country');
            $table->string('city');
            $table->string('address');

            // Property details
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('parking_spaces')->default(0);

            //detailes
            $table->integer('wifi')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean('garden')->default(0);
            $table->boolean('pool')->default(0);

            // Images
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
