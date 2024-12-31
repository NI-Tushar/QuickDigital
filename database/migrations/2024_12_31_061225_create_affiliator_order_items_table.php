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
        Schema::create('affiliator_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('affiliator_order_id');
            $table->enum('ser_type', ['Software', 'DigitalService', 'DigitalProduct']);
            $table->unsignedBigInteger('ser_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->string('unit')->nullable();
            $table->decimal('rate', 10, 2);
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreign('affiliator_order_id')->references('id')->on('affiliator_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliator_order_items');
    }
};
