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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity')->default(0); // default 0 - as if In case if the admin wants to create a product that is to be available soon
            $table->boolean('published')->default(true);
            $table->boolean('show_on_homepage')->default(false);
            $table->integer('notify_admin_for_quantity_below')->default(0);
            $table->integer('order_minimum_quantity')->default(1);
            $table->integer('order_maximum_quantity')->default(999);
            $table->boolean('not_returnable')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
