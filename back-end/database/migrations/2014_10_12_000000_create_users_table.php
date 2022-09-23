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
       Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name', 64);
            $table->string('last_name', 64)->nullable();
            $table->string('user_name', 64)->nullable();
            $table->string('password', 256)->nullable();
            $table->string('contact_no1', 32)->unique();
            $table->string('contact_no2', 32)->unique()->nullable();
            $table->string('email', 64)->unique()->index('email')->nullable();
            $table->string('role', 32)->unique()->default('Admin');
            $table->string('photo')->nullable();
            $table->date('birthday', 16)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
