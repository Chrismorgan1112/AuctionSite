<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->foreignId('user_id')->constrained('users');  //$table->foreignId('user_id')->constrained('users', 'user_id');
            $table->enum('status', ['bidding', 'cart', 'purchased']);
            $table->foreignId('product_id')->constrained('products', 'product_id');
            $table->integer('price');
            $table->timestamps();
            $table->dateTime('transaction_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
