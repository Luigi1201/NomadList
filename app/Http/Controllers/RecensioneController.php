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

    public function dropRecensioneFunction(Request $request){
        $IdCitta=$request->CittaId;
        $query = DB::table('recensione')
            ->where('user_id', '=', session('LoggedUser'))
            ->where('citta_id', '=', $IdCitta)
            ->delete();
        $nome = DB::table('citta')->where('id', $IdCitta)->value('nome');
        if($query){
            return redirect('/'.$nome)->with('successDelete','Un commento è stato eliminato');
        }else{
            return redirect('/'.$nome)->with('failDelete','Qualcosa è andato storto');
        }          
    }

    
    public function modifyCommentFunction(Request $request){
        $request->commentModified;
        /*$IdCitta = $request->CittaId;
        $nuovoCommento = $request->commentModified;
        $affected = DB::table('recensione')
              ->where('user_id', '=', session('LoggedUser'))
              ->where('citta_id', '=', $IdCitta)
              ->update(['commento' => 1]);
        $nome = DB::table('citta')->where('id', $IdCitta)->value('nome');
        */
    }
    

}
