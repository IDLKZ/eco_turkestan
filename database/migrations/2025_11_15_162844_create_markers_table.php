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
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreignId('event_id')->references('id')->on('events');
            $table->foreignId('sanitary_id')->references('id')->on('sanitaries');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('breed_id')->references('id')->on('breeds');
            $table->foreignId('status_id')->nullable()->references('id')->on('statuses');
            $table->foreignId('place_id')->references('id')->on('places');
            $table->foreignId('area_id')->nullable()->references('id')->on('areas');
            $table->text('geocode');
            $table->point("point")->nullable();
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
