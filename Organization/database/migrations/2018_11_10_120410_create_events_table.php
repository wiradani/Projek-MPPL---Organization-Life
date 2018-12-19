<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id_event');
            $table->string('nama_event');
            $table->text('deskripsi_event');
            $table->unsignedInteger('organization_id_organization')->default(0);
            $table->dateTime('time_start');
            $table->dateTime('time_finish');
            $table->smallInteger('points_reward');
            $table->timestamps();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('organization_id_organization')->references('id_organization')->on('organizations');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
