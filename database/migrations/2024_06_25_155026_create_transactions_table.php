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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('booking_code', length:100);
            $table->string('bank_code', length: 20);
            $table->string('bank_tran_no', length:255);
            $table->string('transaction_no', length:50);
            $table->string('content', length:100);
            $table->string('amount', length:100);
            $table->string('pay_date', length:100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
