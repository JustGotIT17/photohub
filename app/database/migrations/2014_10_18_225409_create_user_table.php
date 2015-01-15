<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('username', 128);
            $table->string('firstName', 128);
            $table->string('lastName', 128);
            $table->string('password', 64);
            $table->string('email', 128);
            $table->tinyInteger('roleID')->default(1);
            $table->tinyInteger('branchID')->default(1);
            $table->string('remember_token')->nullable();
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
