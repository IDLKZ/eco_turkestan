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
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
//            $table->foreign('type_id')->references('id')->on('types')->nullOnDelete();
//            $table->foreignId('event_id')->references('id')->on('events')->nullOnDelete();
//            $table->foreignId('sanitary_id')->references('id')->on('sanitaries')->nullOnDelete();
//            $table->foreignId('category_id')->references('id')->on('categories')->nullOnDelete();
//            $table->foreignId('breed_id')->references('id')->on('breeds')->nullOnDelete();
//            $table->foreignId('status_id')->nullable()->references('id')->on('statuses')->nullOnDelete();
//            $table->foreignId('place_id')->references('id')->on('places')->cascadeOnDelete();
            $table->text('geocode');
            $table->string('image_url')->nullable();
            $table->string('age')->nullable();
            $table->string('height');
            $table->string('diameter');
            $table->string('landing_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};
