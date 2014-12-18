<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_accounts', function($table)
        {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('uid')->unsigned()->index();
			$table->tinyInteger('status')->default('0');
			$table->string('api_key');
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
		Schema::drop('api_accounts');
	}

}
