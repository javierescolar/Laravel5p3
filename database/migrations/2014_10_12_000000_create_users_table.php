<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone1')->default('');
            $table->string('phone2')->default('');
            $table->string('profession')->default('');
            $table->date('birthdate')->default("1900-01-01");
            $table->string('gener')->default('');
            $table->string('image')->default('users/user_default.png');
            $table->string('aboutme',8000);
            $table->enum('role',['user','admin'])->default('user');
            $table->integer('discount_user')->default(2);
            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->string('confirm_token')->default('');
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
        Schema::drop('users');
    }
}
