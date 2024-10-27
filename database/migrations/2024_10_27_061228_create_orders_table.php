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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            //Payment
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_type')->nullable();
            $table->float('amount',8,2);
            $table->float('total_amount',8,2)->nullable();
            //Order
            $table->string('order_no')->nullable();
            $table->date('order_date')->nullable();
            $table->string('order_time')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
            $table->integer('order_quantity')->nullable();
            $table->string('order_currency')->nullable();
            $table->string('order_total')->nullable();
            $table->string('order_type')->nullable();
            $table->date('order_process_date');
            $table->string('order_status');
            $table->string('order_note')->nullable();
            //Delivery
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('delivery_note')->nullable();
            //invoice
            $table->string('invoice_no');
            $table->string('invoice_date')->nullable();
            $table->string('invoice_time')->nullable();
            $table->string('invoice_status')->nullable();
            $table->string('invoice_note')->nullable();
            //shipping
            $table->string('shipping_name')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address')->nullable();
            //billing
            $table->string('billing_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_address')->nullable();
            //
            $table->string('total')->nullable();
            $table->string('status')->nullable();
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
