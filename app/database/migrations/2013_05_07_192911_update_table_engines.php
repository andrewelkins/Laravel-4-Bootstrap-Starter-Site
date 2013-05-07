<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateTableEngines extends Migration {

    /**
     * Run the migrations.
     * Force all tables to InnoDB.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
        });
        Schema::table('posts', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
        });
        Schema::table('comments', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
        });
        Schema::table('roles', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
        });
        Schema::table('assigned_roles', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
        });
        Schema::table('password_reminders', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
