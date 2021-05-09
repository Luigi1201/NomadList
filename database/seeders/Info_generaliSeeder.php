<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class Info_generaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_generali')->insert([
            'coordinate' => ' 41°54"\'"39"\""24 N , 12°28"\'"54"\""48 E ',
            'abitanti' => 2808293,
            'connessione' => 15,
            'costo_vita' => 3392,
            'citta_id' => 1
        ]);
    }
}
