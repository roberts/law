<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('file_id')->index();
            $table->string('fileable_type')->index();
            $table->unsignedInteger('fileable_id')->index();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('fileables', function($table) {
            $table->foreign('file_id')->references('id')->on('files')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fileables', function ($table) {
            $table->dropForeign(['file_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('fileables');
        Schema::enableForeignKeyConstraints();
    }
}
