<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) { // Also called Litigation
            $table->increments('id');
            $table->string('case_number');
            // Can be composed of multiple matters (files)
            $table->string('county');
            $table->string('state');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('cases', function($table) {
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
        Schema::table('cases', function ($table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cases');
        Schema::enableForeignKeyConstraints();
    }
}
