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
            $table->string('description')->nullable();
            $table->longText('features')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('affiliator_commission',10,2)->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('demo_link')->nullable();
            $table->boolean('customer_enabled')->default(false);
            $table->boolean('is_populer')->default(false);
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
