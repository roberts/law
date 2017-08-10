<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInjuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injuries', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('injuries', function($table) {
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
        Schema::table('injuries', function ($table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['permission_id']);
        });
        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('injuries');
        Schema::enableForeignKeyConstraints();
    }
}
