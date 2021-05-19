<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class RecensioneController extends Controller
{
    public function recensioneFunction(Request $request){
        if(session()->has('LoggedUser')){
            $CittaId=$request->CittaId;
            $UtenteId=session('LoggedUser');
            $Recensione=$request->Recensione;
            //$tabellaRecensioni = DB::table('recensione');
            $query = DB::table("recensione")
                ->insert([
                    'commento'=> $Recensione,
                    'citta_id'=>$CittaId,
                    'user_id'=>$UtenteId,
                    'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                    'updated_at' => \Carbon\Carbon::now()  # new \Datetime()
                ]);
        }
        $nome = DB::table('citta')->where('id', $CittaId)->value('nome');
        return redirect('/'.$nome);
    }
}
