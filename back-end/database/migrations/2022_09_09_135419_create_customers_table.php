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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('cust_id');
            $table->string('first_name', 64);
            $table->string('last_name', 64)->nullable();
            $table->string('father_name', 64)->nullable();
            $table->string('tazkira_ID', 32)->nullable();
            $table->string('contact_NO', 32)->unique()->nullable();
            $table->string('photo')->default('customer.png')->nullable();
            $table->string('email', 32)->unique()->index('email')->nullable();
            $table->string('address', 256);
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
        Schema::dropIfExists('table_customers');
    }
};
