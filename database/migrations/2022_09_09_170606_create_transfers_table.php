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
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('tran_id');
            $table->integer('currency_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('from_cust_id')->unsigned();
            $table->integer('to_cust_id')->unsigned();
            $table->decimal('amount_transferred', 12, 2);
            $table->integer('status')->default(0)->nullable();
            $table->foreign('currency_id')->references('currency_id')->on('currencies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('from_cust_id')->references('cust_id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('to_cust_id')->references('cust_id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('transfers');
    }
};
