<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organization_id')->index(); // Id of firm or organization on contacts table
            $table->unsignedInteger('member_id')->index(); // Id of person on contacts table
            $table->boolean('admin')->default(0); // If member is a user and should have admin rights, then put 1
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('organization_members', function($table) {
            $table->foreign('organization_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('organization_members', function ($table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['member_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('organization_members');
        Schema::enableForeignKeyConstraints();
    }
}
