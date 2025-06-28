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
            $table->string('name');
            $table->string('code')->unique();
            $table->string('type'); // 'percentage' or 'fixed'
            $table->decimal('value', 10, 2); // Value of the coupon
            $table->dateTime('start_date')->nullable(); // When the coupon becomes active
            $table->dateTime('end_date')->nullable(); // When the coupon expires
            $table->integer('usage_limit')->nullable(); // Maximum number of times the coupon can be used
            $table->integer('used_count')->default(0); // Number of times the coupon has been used
            $table->boolean('is_active')->default(true); // Whether the coupon is currently active
            $table->boolean('is_single_use')->default(false); //
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
