<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sex');
            $table->string('prefix')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('display_name');
            $table->string('suffix')->nullable();
            $table->string('initials', 3)->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('title');
            $table->string('work_phone', 25)->nullable();
            $table->string('home_phone', 25)->nullable();
            $table->string('cell_phone', 25)->nullable();
            $table->string('fax', 25)->nullable();
            $table->string('email')->unique();
            $table->string('birth_date');
            $table->string('birth_city');
            $table->string('birth_state');
            $table->string('ssn', 60);
            $table->string('dln', 60);
            $table->string('dl_state');
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
        Schema::dropIfExists('clients');
    }
}
