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
        Schema::create('quickbusiness', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('profession')->nullable();
            $table->string('institute')->nullable();
            $table->string('gender')->nullable();
            $table->text('interests')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('agree')->nullable();
            $table->enum('type', ['normal', 'affiliator'])->default('normal');
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quickbusiness');
    }
};
