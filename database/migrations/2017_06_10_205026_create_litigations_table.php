<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLitigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('litigations', function (Blueprint $table) { // Also called Litigation
            $table->increments('id');
            $table->string('reference_number')->unique()->index(); // Format: YYYY-DUI-XXXXXX (year, file_type abbreviation (3 letters), litigation count for file type in that year)
            $table->unsignedInteger('file_type_id')->index();
            $table->string('case_number')->nullable();
            // Can be composed of multiple matters (files) of the same file type
            $table->string('county');
            $table->string('state', 2);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('litigations', function($table) {
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
        Schema::table('litigations', function ($table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('litigations');
        Schema::enableForeignKeyConstraints();
    }
}
