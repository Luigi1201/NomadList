<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Citta;

//Funzione per ricavare i dati sul meteo di una città
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
        $citta = "Roma"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Roma

        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);
    }
}
