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
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->unique(); // Used when person is user in system. If used, can only be one to one relationship
            $table->string('display_name'); // Typically is first and last name
            $table->string('email')->unique();
            $table->string('sex');
            $table->string('last_name'); // Default greeting is prefix last_name or if prefix is NULL then Mr. or Ms. last_name depending on sex, which is required
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('prefix', 6)->nullable(); // Could be Dr. or other prefix
            $table->string('suffix')->nullable();
            $table->string('informal_greeting')->nullable(); // Person's nickname for informal situations. Different than the legal first name.
            $table->string('initials', 3)->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('title')->nullable();
            $table->string('work_phone', 25)->nullable();
            $table->string('home_phone', 25)->nullable();
            $table->string('cell_phone', 25)->nullable();
            $table->string('fax', 25)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('birth_state')->nullable();
            $table->string('ssn', 60)->nullable();
            $table->string('dln', 60)->nullable();
            $table->string('dl_state')->nullable();
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
        Schema::dropIfExists('persons');
    }
}
