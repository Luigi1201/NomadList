<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citta;

class RicercaController extends Controller
{
    public function ricercaFunction(Request $request){
        $request->validate([
            'cityName'=>'required'
        ]);
        $nomeCitta = $request->cityName;
        $listaCittà= Citta::all();
        $find=false;
        foreach($listaCittà as $Città){
            if( strcasecmp($Città['nome'], $nomeCitta) == 0 ){
                $find = true;
            }
        }
        if($find){
            return redirect('/'.$nomeCitta);
        }elseif(!$find){
            return back()->with('InvalidName','La città che stai cercando non è presente');
        }
    }
}
