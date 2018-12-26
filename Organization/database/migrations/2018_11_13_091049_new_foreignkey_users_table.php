<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewForeignkeyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           
            $table->foreign('role_id')->references('id_role')->on('roles')->onDelete('cascade')->nullable();
            $table->foreign('divisi_id')->references('id_division')->on('divisions')->onDelete('cascade')->nullable();
            $table->foreign('kontak_id')->references('id_contact')->on('contacts')->onDelete('cascade')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
