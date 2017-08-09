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
            $table->string('file_number'); // YYYY-MM-XXXXX where YYYY-MM is year and month of creation and then auto-increase by 1 for the last 5 digits.
            $table->unsignedInteger('owner'); // Owner is a firm, so this is id on organization table. Can have multiple firms that have access to it as co-counsels
            // Can have only one type: Dust Mask, Car Wreck, DUI, Estate Planning, etc.
            // Can have multiple intake forms so need to create many to many polymorphic pivot on intake types
            // Can have more than one plaintiff through the intake forms
            // Can have more than one defendant - manytomany
            $table->unsignedInteger('status_id'); // Break into it's own table so that we can time stamp all of the changes
            $table->unsignedInteger('source_id');
            $table->unsignedInteger('litigation_id')->nullable(); // One litigation have have multiple matters(files)
            $table->date('sol')->nullable(); // Date field for statute of limitiations
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps(); //created_by is matter open date
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
