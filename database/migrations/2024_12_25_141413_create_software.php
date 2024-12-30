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
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('desc')->nullable();
            $table->longText('features')->nullable();
            $table->unsignedBigInteger('customized_price')->nullable();
            $table->unsignedBigInteger('before_price')->nullable();
            $table->unsignedBigInteger('subsription_price')->nullable();
            $table->unsignedBigInteger('margin')->nullable();
            $table->Integer('star_rating')->nullable();
            $table->string('poster_image')->nullable();
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
        Schema::dropIfExists('software');
    }
};
