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
            $table->string('type_id'); // Male of Female (sex) if person, and coporation type if corporation
            $table->string('display_name'); // Typically is first and last name or the name of the corporation
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
            $table->string('website')->nullable(); // Used only for corporations
            $table->string('title')->nullable(); // Used only for persons
            $table->date('birth_date')->nullable(); // Used only for persons
            $table->string('birth_city')->nullable(); // Used only for persons
            $table->string('birth_state')->nullable(); // Used only for persons
            $table->string('ssn', 60)->nullable(); // Used only for persons
            $table->string('dln', 60)->nullable(); // Used only for persons
            $table->string('dl_state')->nullable(); // Used only for persons
            $table->string('ein', 60)->nullable(); // Used only for corporations
            $table->string('dba')->nullable(); // Used only for corporations
            $table->string('branch')->nullable(); // Used only for corporations
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
        Schema::dropIfExists('contacts');
    }
}
