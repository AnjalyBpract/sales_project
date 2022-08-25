<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_tables', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('product_category_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('trasation_type');
            $table->foreignId('user_id')->constrained();
            $table->string('quantity');
            $table->decimal('rate');
            $table->decimal('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_tables');
    }
}
