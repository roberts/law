<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) { // Also called Matters
            $table->increments('id');
            $table->string('file_number')->index(); // YYYY-MM-XXXXX where YYYY-MM is year and month of creation and then auto-increase by 1 for the last 5 digits.
            $table->unsignedInteger('counsel'); // Firm that owns the matter, so it is organization id on contacts table. 
            // Can have multiple firms that have access to it as co-counsels via relations table
            // Can have multiple intake forms via fileables polymorphic pivot table
            // Can have more than one plaintiff through the intake forms
            // Can have more than one defendant through relations table
            // Current status determined by most recent entry on file_status table so has time stamp all of the changes
            $table->unsignedInteger('file_type_id'); // Can have only one type: Dust Mask, Car Wreck, DUI, Estate Planning, etc.
            $table->unsignedInteger('source_id');
            $table->unsignedInteger('referral_id')->nullable(); // Use only when source_id is 1 or 2 (general referral or referral from law firm) & the referral contact is known
            $table->unsignedInteger('case_id')->nullable()->index(); // One case(litigation) may have have multiple matters(files)
            $table->date('sol')->nullable(); // Date field for statute of limitiations
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps(); //created_by is matter open date
            $table->softDeletes();
        });

        Schema::table('files', function($table) {
            $table->foreign('counsel')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('referral_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('files', function ($table) {
            $table->dropForeign(['counsel']);
            $table->dropForeign(['source_id']);
            $table->dropForeign(['referral_id']);
            $table->dropForeign(['case_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('files');
        Schema::enableForeignKeyConstraints();
    }
}
