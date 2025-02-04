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
        Schema::create('custom_order', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('item_id')->nullable();
            $table->string('item_type')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('status', ['Pending','Contacted','In-progress','Orderd','Delivered'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_order');
    }
};
