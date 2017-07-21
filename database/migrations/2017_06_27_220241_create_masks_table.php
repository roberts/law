<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masks', function (Blueprint $table) {
            $table->increments('id');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masks');
    }
}
