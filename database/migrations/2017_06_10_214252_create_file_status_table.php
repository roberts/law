<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_status', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });

        Schema::table('file_status', function($table) {
            $table->foreign('file_id')->references('id')->on('files')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_status', function ($table) {
            $table->dropForeign(['file_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['created_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('file_status');
        Schema::enableForeignKeyConstraints();
    }
}
