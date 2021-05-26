<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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

        $citta = "Londra"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Londra
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Madrid"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Madrid
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Parigi"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Parigi
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Barcellona"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Barcellona
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Mosca"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Mosca
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Sydney"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Sydney
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Vienna"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Vienna
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Seoul"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Seoul
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Berlino"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Berlino
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Istanbul"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Istanbul
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Toronto"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Toronto
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Belgrado"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Belgrado
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Atlanta"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Atlanta
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Lisbona"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Lisbona
        DB::table('info_meteo')->insert([
            'temperatura' => (($json['main']['temp'])-273.15),
            'umidità' => $json['main']['humidity'],
            'vento' => $json['wind']['speed'],
            'nuvolosità' => $json['clouds']['all'],
            'pressione_atmosferica' => $json['main']['pressure'],
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Brasov"; //Città a cui sono riferiti i dati
        $json = getJson($citta); //dati meteo raccolti
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Brasov
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
