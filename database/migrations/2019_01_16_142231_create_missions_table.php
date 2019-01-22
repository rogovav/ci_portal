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
            $table->string('from')->nullable();
            $table->integer('owner_id')->nullable();
            $table->integer('worker_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('cid')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('building_id')->nullable();
            $table->integer('priority')->nullable();
            $table->dateTime('date_from')->nullable();
            $table->dateTime('date_to')->nullable();
            $table->string('info')->nullable();
            $table->integer('status')->default(1);
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
