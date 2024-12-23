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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('order_id')->nullable();
            $table->text('ebook_id')->nullable();
            $table->string('ebook_title', 255);
            $table->decimal('price', 10, 2);
            $table->string('name',30)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',40)->nullable();
            $table->text('bank_trx_id')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('transaction_status')->nullable();
            $table->string('method',20)->nullable();
            $table->string('sp_message',20)->nullable();
            $table->enum('status', ['Pending', 'InProgress', 'Completed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};



