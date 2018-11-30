<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRoleToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
         // Insert some stuff
         DB::table('roles')->insert([
            ['id_role' => 1, 'nama_role' => 'pembina','deskripsi_role'=>'pembina organisasi'],
            ['id_role' => 2, 'nama_role' => 'ketua','deskripsi_role'=>'ketua organisasi'],
            ['id_role' => 3, 'nama_role' => 'kediv','deskripsi_role'=>'salah seorang kadiv di organisasi'],
            ['id_role' => 4, 'nama_role' => 'anggota','deskripsi_role'=>'anggota biasa di organisasi'],
        ]);
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
