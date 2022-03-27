<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('sub_amount', 4, 2);
            $table->integer('quantity');
            $table->integer('order_id');
            $table->integer('book_id');
            $table->timestamps();
            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table
                ->foreign('book_id')
                ->references('id')
                ->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
