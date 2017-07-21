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
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner');
            $table->unsignedInteger('co_counsel');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('litigation_id');
            $table->unsignedInteger('type');
            $table->unsignedInteger('status');
            $table->unsignedInteger('Sub_status');
            $table->unsignedInteger('source');
            $table->unsignedInteger('sol');
            $table->date('opened');
            $table->date('closed');
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
        Schema::dropIfExists('matters');
    }
}
