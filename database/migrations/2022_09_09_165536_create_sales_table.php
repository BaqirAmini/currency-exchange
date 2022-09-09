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
       Schema::create('sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->integer('cust_id')->unsigned();
            $table->integer('currency_code')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->decimal('amount_sold',12, 2)->nullable();
            $table->decimal('unit_price',12, 2);
            $table->decimal('total_price',12, 2);
            $table->foreign('currency_code')->references('currency_code')->on('currencies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cust_id')->references('cust_id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('sales');
    }
};
