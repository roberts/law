<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notable_type')->index(); // either matter or litigation or contact or organization
            $table->unsignedInteger('notable_id')->index();
            $table->enum('broadcast', ['none', 'firm', 'all'])->default('none'); // Should note be shown on home screen? None, firm, all (display on co-counsel firms and user’s firm)
            $table->text('note', 2000);
            $table->unsignedInteger('created_by')->index();
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('notes', function($table) {
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
        Schema::table('notes', function ($table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('notes');
        Schema::enableForeignKeyConstraints();
    }
}
