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
        Schema::create('quick_shop_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quick_shop_category_id')->constrained('quick_shop_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('slug');
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->default(0);
            $table->integer('qty')->nullable();
            $table->string('unit')->nullable();
            $table->text('images')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_shop_products');
    }
};
