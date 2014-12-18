<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachments', function($table)
        {
			$table->engine = 'InnoDB';
	        $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('name');
			$table->string('type');
			$table->string('size');
			$table->string('extension');
			$table->string('hash');
			$table->tinyInteger('private')->default('0');
			$table->tinyInteger('attach_status')->default('0');
			$table->string('save_path')->nullable()->default(null);
			$table->string('save_name')->nullable()->default(null);
			$table->tinyInteger('save_domain')->default('0');
			$table->tinyInteger('client_type')->default('0');
			$table->integer('width')->default('0');
			$table->integer('height')->default('0');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attachments');
	}

}
