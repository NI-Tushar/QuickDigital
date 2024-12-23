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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('instructor_id');
            $table->string('language');
            $table->unsignedBigInteger('category_id');
            $table->string('difficulty_level');
            $table->string('course_type');
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->longText('what_will_i_learn');
            $table->longText('tageted_audience');
            $table->longText('materials_included');
            $table->longText('requirements');
            $table->string('provider');
            $table->string('course_intro_url');
            $table->string('duration');
            $table->string('course_thumbnail')->nullable();
            $table->unsignedBigInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
