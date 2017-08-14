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
            $table->unsignedInteger('client_id')->index();
            $table->unsignedInteger('file_id')->index();
            $table->string('mine_start_date')->nullable();
            $table->string('mine_end_date')->nullable();
            $table->string('underground_pre98')->nullable();
            $table->string('ky_pre98')->nullable();
            $table->string('counties')->nullable();
            $table->string('black_lung')->nullable();
            $table->string('black_lung_stage')->nullable();
            $table->string('black_lung_diagnosed')->nullable();
            $table->string('copd')->nullable();
            $table->string('emphysema')->nullable();
            $table->string('bankruptcy')->nullable();
            $table->string('bankruptcy_yr')->nullable();
            $table->string('smoker')->nullable();
            $table->string('smoker_start_date')->nullable();
            $table->string('smoker_end_date')->nullable();
            $table->string('claims_state_bl')->nullable();
            $table->string('claims_state_bl_yr')->nullable();
            $table->string('claims_fed_bl')->nullable();
            $table->string('claims_fed_bl_yr')->nullable();
            $table->string('sol_mo')->nullable();
            $table->string('sol_yr')->nullable();
            $table->string('sol_explanation')->nullable();
            $table->string('total_usage')->nullable();
            $table->string('mask_1')->nullable();
            $table->string('mask_1_percent')->nullable();
            $table->string('mask_2')->nullable();
            $table->string('mask_2_percent')->nullable();
            $table->string('mask_3')->nullable();
            $table->string('mask_3_percent')->nullable();
            $table->string('mask_4')->nullable();
            $table->string('mask_4_percent')->nullable();
            $table->string('mask_5')->nullable();
            $table->string('mask_15_percent')->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('intake_masks', function($table) {
            $table->foreign('client_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('intake_masks', function ($table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['file_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('intake_masks');
        Schema::enableForeignKeyConstraints();
    }
}
