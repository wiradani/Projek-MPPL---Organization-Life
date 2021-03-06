<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id_division')->nullable();
            $table->string('nama_division')->nullable();
            $table->text('deskripsi_division')->nullable();
            $table->integer('cabinet_id_cabinet')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('cabinet_id_cabinet')->references('id_cabinet')->on('cabinets')->onDelete('cascade')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
