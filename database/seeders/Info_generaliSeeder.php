<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
            'coordinate' => 'lon: -85.1647, lat: 34.257',
            'abitanti' => 2808293,
            'connessione' => 15,
            'costo_vita' => 3392,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Londra"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Londra
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: -0.1257, lat: 51.5085',
            'abitanti' => 9372610,
            'connessione' => 22,
            'costo_vita' => 3561,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Madrid"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Madrid
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: -3.7026, lat: 40.4165',
            'abitanti' => 3088629,
            'connessione' => 28,
            'costo_vita' => 2308,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Parigi"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Parigi
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 2.3488, lat: 48.8534',
            'abitanti' => 	2140000,
            'connessione' => 32,
            'costo_vita' => 3393,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Barcellona"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Barcellona
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 2.159, lat: 41.3888',
            'abitanti' => 	1582436,
            'connessione' => 31,
            'costo_vita' => 2519,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Mosca"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Mosca
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 37.6156, lat: 55.7522',
            'abitanti' => 	12606070,
            'connessione' => 16,
            'costo_vita' => 1536,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Sydney"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Sydney
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 151.2073, lat: -33.8679',
            'abitanti' => 	6031215,
            'connessione' => 19,
            'costo_vita' => 3228,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Vienna"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Vienna
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 16.3721, lat: 48.2085',
            'abitanti' => 	1929618,
            'connessione' => 39,
            'costo_vita' => 2376,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Seoul"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Seoul
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 126.9778, lat: 37.5683',
            'abitanti' => 	11636699,
            'connessione' => 20,
            'costo_vita' => 1914,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Berlino"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Berlino
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 13.4105, lat: 52.5244',
            'abitanti' => 	3992635,
            'connessione' => 32,
            'costo_vita' => 2518,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Istanbul"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Istanbul
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 28.9833, lat: 41.0351',
            'abitanti' => 	15872790,
            'connessione' => 11,
            'costo_vita' => 870,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Toronto"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Toronto
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: -79.4163, lat: 43.7001',
            'abitanti' => 	2853815,
            'connessione' => 22,
            'costo_vita' => 2743,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Belgrado"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Belgrado
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 20.4651, lat: 44.804',
            'abitanti' => 	1221593,
            'connessione' => 34,
            'costo_vita' => 1278,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Atlanta"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Atlanta
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: -84.388, lat: 33.749',
            'abitanti' => 	526028,
            'connessione' => 32,
            'costo_vita' => 2280,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Lisbona"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Lisbona
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: -9.1333, lat: 38.7167',
            'abitanti' => 	526500,
            'connessione' => 27,
            'costo_vita' => 1682,
            'citta_id' => $citta_id[0]['id']
        ]);

        $citta = "Brasov"; //città a cui fanno riferimento i dati
        $citta_id = Citta::where('nome', $citta)->get("id"); //id della tupla con nome=Brasov
        DB::table('info_generali')->insert([
            'coordinate' => 'lon: 25.3333, lat: 45.75',
            'abitanti' => 	222361,
            'connessione' => 30,
            'costo_vita' => 1166,
            'citta_id' => $citta_id[0]['id']
        ]);

    }
}
