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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('coupon_id')->constrained('coupons');
            $table->string('fullname');
            $table->string('email');
            $table->longText('address');
            $table->string('city', length:100)->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country');
            $table->string('phone_number');
            $table->longText('special_request')->nullable();
            $table->string('arrival_time')->nullable();
            $table->string('status', length:50);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('total_price', length:100);
            $table->string('room_quantity', length:50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
