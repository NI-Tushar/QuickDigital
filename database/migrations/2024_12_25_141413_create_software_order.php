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
        Schema::create('software_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('software_id')->nullable();
            $table->string('user_type')->nullable();
            $table->enum('software_type', ['sell', 'subscription', 'hosting'])->nullable();
            $table->unsignedBigInteger('soft_price')->nullable();
            $table->unsignedBigInteger('hosting_charge')->nullable();
            $table->unsignedBigInteger('subscription_price')->nullable();
            $table->enum('order_status', ['pending', 'in_progress', 'complete'])->nullable();
            $table->text('order_id')->nullable();
            $table->text('bank_trx_id')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('transaction_status')->nullable();
            $table->string('method',20)->nullable();
            $table->string('sp_message',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_order');
    }
};
