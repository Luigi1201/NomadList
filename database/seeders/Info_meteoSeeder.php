<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Citta;

function getJson($citta){
    $url = "http://api.openweathermap.org/data/2.5/weather?q=$citta&appid=2732c9ea6b5f3d562d093d2ad6effc52";
    $json = file_get_contents($url);
    $json = json_decode($json,true);
    return $json;
}

class Info_meteoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citta="Roma";
        $json=getJson($citta);

        $citta = Citta::where('nome', $citta)->get();

        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta->id
        ]);
    }
}
