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
        Schema::create('affiliator_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->enum('service_type', ['Software', 'DigitalService', 'DigitalProduct']);
            $table->unsignedBigInteger('service_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('delivery_status', ['Pending', 'Confirmed', 'In-progress', 'Delivered'])->default('Pending');
            $table->enum('payment_status', ['Sixty-percent', 'forty-percent', 'Un-paid', 'Paid'])->default('Un-paid');
            $table->enum('payment_method', ['Bkash', 'Nagad', 'Upay', 'Card'])->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');

            $table->decimal('sub_total', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliator_orders');
    }
};
