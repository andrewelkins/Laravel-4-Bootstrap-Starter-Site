<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysAssignedRoles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned_roles', function(Blueprint $table) {
            // Eloguent doesn't handle updating columns :(
            // Clean up orphans before setting up foreign keys.
            DB::statement('DELETE FROM assigned_roles
                WHERE
                user_id NOT IN (SELECT id FROM users)
                OR
                role_id NOT IN (SELECT id FROM roles)');
            // Need to make sure the columns are unsigned.
            DB::statement('ALTER TABLE assigned_roles MODIFY user_id int(10) unsigned');
            DB::statement('ALTER TABLE assigned_roles MODIFY role_id int(10) unsigned');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigned_roles', function(Blueprint $table) {
            $table->dropForeign('assigned_roles_user_id_foreign');
            $table->dropForeign('assigned_roles_role_id_foreign');
        });
    }

}
