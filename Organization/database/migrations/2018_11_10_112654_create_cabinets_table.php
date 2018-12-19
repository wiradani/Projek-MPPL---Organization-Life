<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->increments('id_cabinet')->nullable();
            $table->string('nama_cabinet');
            $table->text('deskripsi_cabinet');
            $table->text('periode_cabinet');
            $table->unsignedInteger('organization_id_organization')->default(0);
            $table->timestamps();
        });
        Schema::table('cabinets', function (Blueprint $table) {
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
        Schema::dropIfExists('cabinets');
    }
}
