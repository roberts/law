<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('relationship_id'); // Id on relationship table. Relation Types = defendant, co-counsel, family, coworker, provider, employer, mine, etc.
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('related_id'); // Person or organization on contacts table. Limited by relationship type.
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('relations', function($table) {
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('related_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('relations', function ($table) {
            $table->dropForeign(['relationship_id']);
            $table->dropForeign(['file_id']);
            $table->dropForeign(['related_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('relations');
        Schema::enableForeignKeyConstraints();
    }
}
