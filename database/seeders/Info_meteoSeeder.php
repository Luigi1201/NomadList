<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class Info_meteoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_meteo')->insert([
            'temperatura' => 1,
            'umidità' => 1,
            'vento' => 1,
            'nuvolosità' => 1,
            'pressione_atmosferica' => 1,
            'citta_id' => 1
        ]);
    }
}
