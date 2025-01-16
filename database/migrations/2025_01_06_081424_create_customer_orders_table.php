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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('delivery_status', ['Pending','Disabled','Confirmed','In-progress','Delivered'])->default('Pending');
            $table->enum('payment_status', ['Sixty-percent', 'forty-percent', 'Un-paid', 'Paid'])->default('Un-paid');
            $table->string('payment_method', 50)->nullable();
            $table->string('service_id')->nullable();
            $table->string('service_type',30)->nullable();
            $table->string('software_type',20)->nullable();
            $table->longText('Custom_requirement_list')->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->foreignId('affiliator_promocode_id')->constrained('affiliator_promocodes')->onUpdate('cascade')->nullable();
            $table->text('bank_trx_id')->nullable();
            $table->text('invoice_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_orders');
    }
};
