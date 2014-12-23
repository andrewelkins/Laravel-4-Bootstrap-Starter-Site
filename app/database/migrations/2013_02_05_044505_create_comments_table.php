<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the `Comments` table
		Schema::create('comments', function($table)
		{
	        $table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('model_id')->unsigned()->default('0');
			$table->integer('place_id')->unsigned()->index();
	        $table->integer('author_id')->unsigned()->index();
	        $table->integer('commenter_id')->unsigned();
        	$table->integer('to_uid')->unsigned();
            $table->integer('to_comment_id')->unsigned();
			$table->tinyInteger('status')->unsigned()->default('0');
			$table->tinyInteger('client_type')->unsigned()->default('0');
			$table->tinyInteger('is_auth')->unsigned()->default('0');
			$table->integer('level')->unsigned()->default('0');
			$table->integer('like')->unsigned()->default('0');
			$table->integer('dislike')->unsigned()->default('0');
			$table->string('comment_url')->default(null);
			$table->text('content');
			$table->text('extend')->default(null);
			$table->timestamps();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Delete the `Comments` table
		Schema::drop('comments');
	}

}
