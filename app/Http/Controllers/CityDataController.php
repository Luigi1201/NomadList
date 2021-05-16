<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citta;
use App\Models\Info_generali;
use App\Models\Info_meteo;

class CityDataController extends Controller
{
    
    public function getData(Request $request){
        //Citta::FindOrFail($nome);
        //$Info_citta = Citta::where('nome', $nome)->get();
        $Info_citta = Citta::where('nome', $request->nome)->get();
        $Info_generali = Info_generali::where('citta_id', $Info_citta[0]['id'])->get();
        $Info_meteo = Info_meteo::where('citta_id', $Info_citta[0]['id'])->get();
        return view( 'admin.città' , ['Info_citta' => $Info_citta, 'Info_generali' => $Info_generali, 'Info_meteo' => $Info_meteo]);
    }
}
