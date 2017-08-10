<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('permission_id');
            $table->timestamp('created_at')->useCurrent();
        });
        
        Schema::table('user_permission', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_permission', function ($table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['permission_id']);
        });
        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_permission');
        Schema::enableForeignKeyConstraints();
    }
}
