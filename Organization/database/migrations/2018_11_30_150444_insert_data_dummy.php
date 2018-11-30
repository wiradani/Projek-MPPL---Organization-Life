<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDataDummy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('rewards')->insert([
            'id_reward'=>1,
            'nama_reward' => "test 1",
            'deskripsi_reward' => 'hanya test saja',
            'points_reward' => 10,
            'quantity_reward'=>10
         ]);
         DB::table('rewards')->insert([
            'id_reward'=>2,
            'nama_reward' => "test 2",
            'deskripsi_reward' => 'hanya test saja',
            'points_reward' => 4,
            'quantity_reward'=>20
         ]);
         DB::table('rewards')->insert([
            'id_reward'=>3,
            'nama_reward' => "test 3",
            'deskripsi_reward' => 'hanya test saja lagi',
            'points_reward' => 8,
            'quantity_reward'=>15
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
