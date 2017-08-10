<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntakeMasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intake_masks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->string('mine_start_date');
            $table->string('mine_end_date');
            $table->string('underground_pre98');
            $table->string('ky_pre98');
            $table->string('counties');
            $table->string('black_lung');
            $table->string('black_lung_stage');
            $table->string('black_lung_diagnosed');
            $table->string('copd');
            $table->string('emphysema');
            $table->string('bankruptcy');
            $table->string('bankruptcy_yr');
            $table->string('smoker');
            $table->string('smoker_start_date');
            $table->string('smoker_end_date');
            $table->string('claims_state_bl');
            $table->string('claims_state_bl_yr');
            $table->string('claims_fed_bl');
            $table->string('claims_fed_bl_yr');
            $table->string('sol_mo');
            $table->string('sol_yr');
            $table->string('sol_explanation');
            $table->string('total_usage');
            $table->string('mask_1');
            $table->string('mask_1_percent');
            $table->string('mask_2');
            $table->string('mask_2_percent');
            $table->string('mask_3');
            $table->string('mask_3_percent');
            $table->string('mask_4');
            $table->string('mask_4_percent');
            $table->string('mask_5');
            $table->string('mask_15_percent');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('intake_masks', function($table) {
            $table->foreign('client_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('intake_masks', function ($table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('intake_masks');
        Schema::enableForeignKeyConstraints();
    }
}
