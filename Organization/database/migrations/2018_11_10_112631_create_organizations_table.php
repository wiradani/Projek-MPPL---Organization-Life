<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id_organization')->nullable();
            $table->string('nama_organization')->nullable();
            $table->text('deskripsi_organization')->nullable();
            $table->unsignedInteger('user_id')->default(0);
            $table->timestamps();
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
