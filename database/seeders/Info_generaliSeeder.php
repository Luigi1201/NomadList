<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Citta;

class Info_generaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citta = "Roma"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Roma

        DB::table('info_generali')->insert([
            'coordinate' => ' 41°54"\'"39"\""24 N , 12°28"\'"54"\""48 E ',
            'abitanti' => 2808293,
            'connessione' => 15,
            'costo_vita' => 3392,
            'citta_id' => $citta_id[0]['id']
        ]);
    }
}
