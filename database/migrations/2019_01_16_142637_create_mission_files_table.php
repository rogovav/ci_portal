<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('mission_id')->unsigned();
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mission_files', function (Blueprint $table) {
            $table->dropForeign('mission_files_mission_id_foreign');
        });
        Schema::dropIfExists('mission_files');
    }
}
