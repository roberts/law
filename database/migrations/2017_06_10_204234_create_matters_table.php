<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) { // Also called Files
            $table->increments('id');
            $table->unsignedInteger('owner'); // Owner is a firm, so this is id on organization table. Can have multiple firms that have access to it as co-counsels
            // Can have more than one plaintiff through the intake forms
            // Can have more than one defendant - manytomany
            $table->unsignedInteger('intakeable_type'); // Dust Mask, Car Wreck, DUI, Estate Planning, etc.
            $table->unsignedInteger('intakeable_id'); //Form Id on the intake type database // can be multiple so need to create many to many polymorphic pivot
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('source_id');
            $table->unsignedInteger('litigation_id')->nullable();
            $table->date('sol')->nullable(); // Date field for statute of limitiations
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps(); //created_by is matter open date
            $table->softDeletes(); //closed date
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matters');
    }
}
