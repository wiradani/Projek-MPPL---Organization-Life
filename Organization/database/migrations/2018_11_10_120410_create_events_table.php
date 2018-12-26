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
            $table->increments('id_event')->nullable();
            $table->string('nama_event')->nullable();
            $table->text('deskripsi_event')->nullable();
            $table->unsignedInteger('organization_id_organization')->default(0);
            $table->dateTime('time_start')->nullable();
            $table->dateTime('time_finish')->nullable();
            $table->smallInteger('points_reward')->nullable();
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
