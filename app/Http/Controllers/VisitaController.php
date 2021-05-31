<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Citta;

class VisitaController extends Controller
{
    /* DA COMPLETARE
    public function visitaFunction(Request $request){
        
        if(session()->has('LoggedUser')){
            $UtenteId=session('LoggedUser');
            $request->validate([
                'citta'=>'required',
                'data'=>'required'
            ]);
            $cittàSelezionata = $request->città;
            $dataSelezionata = $request->data;
            $dataOdierna=date("Y-m-d");
            if($dataSelezionata>$dataOdierna){
                return back()->with('dataNonValida','La data inserita non è valida');
            }
            $cities=Citta::all();
            $cittaid=0;
            foreach($cities as $city){
                if(strcasecmp($city['nome'], $cittàSelezionata) == 0){
                    $cittaid=$city->id;
                }
            }
            //controllo se la visita esiste già
            $visita = DB::table('visita')
            ->where("user_id",$UtenteId)
            ->where("citta_id", $cittaid)
            ->where("data", $dataSelezionata)
            ->first();

            if($visita){
                return back()->with('esisteGià','Hai già inserito questo viaggio!');
            }else{
                 //Inserimento like nel db
                $queryInsert = DB::table("visita")
                ->insert([
                    'citta_id'=> $cittaid,
                    'user_id'=>$UtenteId,
                    'data'=>$dataSelezionata
                ]);     
                if($queryInsert){
                    return back()->with('inserted','Successo!');
                }else{
                    return back()->with('erroreInserimento','Qualcosa è andato storto');
                }                   
            }
        }
        

    }
    */
}
