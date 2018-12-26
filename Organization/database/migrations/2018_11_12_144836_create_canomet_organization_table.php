<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanometOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinet_organization', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->integer('cabinet_id')->unsigned()->nullable();

            $table->foreign('organization_id')->references('id_organization')->on('organizations')->onDelete('cascade')->nullable();
            $table->foreign('cabinet_id')->references('id_cabinet')->on('cabinets')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabinet_organization');
    }
}
