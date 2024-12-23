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
        Schema::create('quick_shop_product_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quick_shop_product_id')->constrained('quick_shop_products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('color')->nullable();
            $table->string('color_code')->nullable();
            $table->string('size')->nullable();
            $table->integer('qty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_shop_product_variations');
    }
};
