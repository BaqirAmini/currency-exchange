<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('purchase_id');
            $table->integer('cust_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->decimal('amount_purchased', 12, 2);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('total_price', 12, 2);
            $table->foreign('cust_id')->references('cust_id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('currency_id')->references('currency_id')->on('currencies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('purchases');
    }
};
