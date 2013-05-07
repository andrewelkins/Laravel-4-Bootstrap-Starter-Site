<?php
use Illuminate\Database\Migrations\Migration;

class EntrustPermissionIndex extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned_roles', function($table)
        {
            $table->index('user_id');
            $table->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigned_roles', function($table)
        {
            $table->dropIndex('user_id');
            $table->dropIndex('role_id');
        });
    }

}
