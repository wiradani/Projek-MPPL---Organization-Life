<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('name_user')->nullable();
            $table->string('email_user')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nim_user')->nullable();
            $table->integer('jumlah_point')->unsigned()->nullable();
            $table->Integer('role_id')->unsigned()->nullable();
            $table->Integer('divisi_id')->unsigned()->nullable();
            $table->Integer('kontak_id')->unsigned()->nullable();
          
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
