<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertUsersTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::table('organizations')->insert([
            'id_organization'=>1,
            'nama_organization' => "HIMALKOM",
            'deskripsi_organization' => 'organisasi mahasiswa ilmu komputer IPB',
         ]);
         DB::table('cabinets')->insert([
            'id_cabinet'=>1,
            'nama_cabinet' => "WIKI",
            'deskripsi_cabinet' => 'kabinet baru',
            'periode_cabinet'=>'2017/2018'
         ]);
         DB::table('cabinet_organization')->insert([
            'id'=>1,
            'organization_id' => 1,
            'cabinet_id' => 1
         ]);
         DB::table('cabinets')->insert([
            'id_cabinet'=>2,
            'nama_cabinet' => "noname",
            'deskripsi_cabinet' => 'kabinet lebih baru',
            'periode_cabinet'=>'2018/2019'
         ]);
         DB::table('cabinet_organization')->insert([
            'id'=>2,
            'organization_id' => 1,
            'cabinet_id' => 2
         ]);
         DB::table('divisions')->insert([
            'id_division'=>1,
            'nama_division' => "edukasi",
            'deskripsi_division' => 'divisi terkejam',
            'cabinet_id'=>1
         ]);
         DB::table('divisions')->insert([
            'id_division'=>2,
            'nama_division' => "kominfo",
            'deskripsi_division' => 'divisi sama kejamnya',
            'cabinet_id'=>1
         ]);
         DB::table('divisions')->insert([
            'id_division'=>3,
            'nama_division' => "eksternal",
            'deskripsi_division' => 'divisi terluar',
            'cabinet_id'=>1
         ]);
        DB::table('users')->insert([
                'id'=>1,
                'name_user' => "user test",
                'email_user' => 'test@gmail.com',
                'password' => bcrypt('password'),
                'nim_user'=>'GG51213123',
                'jumlah_point'=>10,
                'role_id'=>1,
                'divisi_id'=>1,
                'kontak_id'=>1
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name_user' => "coba aja",
            'email_user' => 'coba@gmail.com',
            'password' => bcrypt('password'),
            'nim_user'=>'GG424213123',
            'jumlah_point'=>5,
            'role_id'=>1,
            'divisi_id'=>1,
            'kontak_id'=>2
    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
