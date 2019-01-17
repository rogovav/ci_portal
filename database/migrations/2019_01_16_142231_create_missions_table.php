<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from');
            $table->integer('owner_id');
            $table->integer('worker_id');
            $table->integer('subject_id');
            $table->string('cid');
            $table->integer('client_id');
            $table->string('address');
            $table->integer('building_id');
            $table->integer('priority');
            $table->dateTime('date_from');
            $table->dateTime('date_to');
            $table->string('info');
            $table->integer('status');
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
        Schema::dropIfExists('missions');
    }
}
