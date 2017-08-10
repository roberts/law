<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name')->unique(); // Typically is first and last name or the name of the corporation
            $table->unsignedInteger('type_id'); // Male of Female (sex) if person, and coporation type if corporation
            $table->unsignedInteger('user_id')->nullable()->unique(); // Used when person is user in system. If used, can only be one to one relationship
            $table->string('last_name')->nullable(); // Required for persons. Default greeting is prefix last_name or if prefix is NULL then Mr. or Ms. last_name depending on sex
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
            $table->string('work_phone', 25)->nullable();
            $table->string('home_phone', 25)->nullable();
            $table->string('cell_phone', 25)->nullable();
            $table->string('fax', 25)->nullable();
            $table->string('email')->unique()->nullable(); // Used only for persons
            $table->string('website')->nullable(); // Used only for organizations
            $table->string('title')->nullable(); // Used only for persons
            $table->date('birth_date')->nullable(); // Used only for persons
            $table->string('birth_city')->nullable(); // Used only for persons
            $table->string('birth_state')->nullable(); // Used only for persons
            $table->string('ssn', 60)->nullable(); // Used only for persons
            $table->string('dln', 60)->nullable(); // Used only for persons
            $table->string('dl_state')->nullable(); // Used only for persons
            $table->string('ein', 60)->nullable(); // Used only for organizations
            $table->string('corp_name')->nullable(); // Used only for organizations. Official corporation name like Tipoff, Inc.
            $table->string('dba')->nullable(); // Used only for organizations
            $table->string('branch')->nullable(); // Used only for organizations
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('contacts', function($table) {
            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('contacts', function ($table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('contacts');
        Schema::enableForeignKeyConstraints();
    }
}
