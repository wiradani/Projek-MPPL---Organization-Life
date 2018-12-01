<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDummyData2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('events')->insert([
            'id_event'=>1,
            'nama_event' => "test 1",
            'deskripsi_event' => 'hanya test saja',
            'date start' => DB::raw('now()'),
            'date finish'=> DB::raw('now()'),
            'points_reward'=>10
         ]);

         DB::table('events')->insert([
            'id_event'=>2,
            'nama_event' => "test 2",
            'deskripsi_event' => 'hanya test saja lagi',
            'date start' => DB::raw('now()'),
            'date finish'=> DB::raw('now()'),
            'points_reward'=>15
         ]);

         DB::table('events')->insert([
            'id_event'=>3,
            'nama_event' => "test 3",
            'deskripsi_event' => 'hanya test saja lagi dan lagi',
            'date start' => DB::raw('now()'),
            'date finish'=> DB::raw('now()'),
            'points_reward'=>20
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
