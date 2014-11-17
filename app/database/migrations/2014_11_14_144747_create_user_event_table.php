<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_event', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('leader_id')->unsigned();
			$table->integer('event_id')->unsigned()->index();
			$table->integer('department_id')->unsigned()->index();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('leader_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

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
		Schema::drop('user_event');
	}

}
