<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places', function($table)
        {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('owner_id')->unsigned()->index();
			$table->string('title');
			$table->string('hours');
			$table->integer('place_type')->default('0');
			$table->string('description')->nullable()->default(null);
			$table->string('keywords')->nullable()->default(null);	
			$table->integer('view_num')->default('0');
			$table->tinyInteger('attachment_num')->default('0');
			$table->integer('comment_num')->default('0');
			$table->integer('cover_id')->default('0');
			$table->integer('position_id')->default('0');
			$table->integer('dealine')->default('0');	
			$table->tinyInteger('place_status')->default('0');
			$table->tinyInteger('is_certified')->default('0');
			$table->text('content')->default(null);
			$table->text('extend')->nullable()->default(null);
			$table->string('latitude');
			$table->string('longitude');
			$table->tinyInteger('geo_status')->default('0');
			$table->string('geohash_code');
			$table->timestamps();
			$table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('places');
	}

}
