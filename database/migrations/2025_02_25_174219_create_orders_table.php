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
            $table->foreignId('user_id');
            $table->unsignedBigInteger('shipping_address_id');
            $table->foreign('shipping_address_id')->references('id')->on('addresses');
            $table->integer('order_status')->default(0); //0 – Pending ,1 – Processing, 2 – Shipped, 3 – Delivered, 4 – Canceled, 5 – Refunded, 6 – On Hold
            $table->integer('shipping_status')->default(0); //0 – Not Shipped, 1 – Shipped, 2 – In Transit, 3 – Out for Delivery, 4 – Delivered, 5 – Delivery Failed, 6 – Returned
            $table->integer('payment_status')->default(0); //0 = Pending, 1 = Completed, 2 = Failed, 3 = Refunded, 4 = Cancelled
            $table->string('payment_method_system_name')->nullable();
            $table->decimal('order_discount', 18, 4)->default(0);
            $table->decimal('order_total', 18, 4);
            $table->decimal('refunded_amount', 18, 4)->default(0);

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
