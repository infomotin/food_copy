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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name')->unique();
            $table->string('coupon_code')->unique();
            $table->text('coupon_description')->nullable();
            $table->integer('coupon_discount')->nullable();
            $table->string('coupon_validity')->nullable();
            $table->string('client_id')->nullable();
            $table->integer('coupon_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
