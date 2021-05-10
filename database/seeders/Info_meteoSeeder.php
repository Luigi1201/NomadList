<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

//ESEMPIO CHIAMATA A URL PER DATI METEO
/*
// set location
$address = "Brooklyn+NY+USA";

//set map api url
$url = "http://maps.google.com/maps/api/geocode/json?address=$address";

//call api
$json = file_get_contents($url);
$json = json_decode($json);
$lat = $json->results[0]->geometry->location->lat;
$lng = $json->results[0]->geometry->location->lng;
echo "Latitude: " . $lat . ", Longitude: " . $lng;

// output
// Latitude: 40.6781784, Longitude: -73.9441579
*/

$citta = 'Roma';
$url = "http://api.openweathermap.org/data/2.5/weather?q=$citta&appid=2732c9ea6b5f3d562d093d2ad6effc52";
$json = file_get_contents($url);
$json = json_decode($json);

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
