<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_infos', function($table)
        {
			$table->engine = 'InnoDB';
	        $table->increments('id');
	        $table->integer('uid')->unsigned()->index();
	        $table->tinyInteger('status');
	        $table->tinyInteger('sex');
	        $table->date('birthday')->default('0000-00-00');
	        $table->integer('score');
	        $table->integer('login_times');
	        $table->timestamps();
	        $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_infos');
	}

}
