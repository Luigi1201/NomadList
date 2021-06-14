<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RecensioneController extends Controller
{
    public function recensioneFunction(Request $request){
        if(session()->has('LoggedUser')){
            $request->validate([
                'CittaId'=>'required',
                'Recensione'=>'required'
            ]);
            $CittaId=$request->CittaId;
            $UtenteId=session('LoggedUser');
            $Recensione=$request->Recensione;
            $query = DB::table("recensione")
                ->insert([
                    'commento'=> $Recensione,
                    'citta_id'=>$CittaId,
                    'user_id'=>$UtenteId,
                    'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                    'updated_at' => \Carbon\Carbon::now()  # new \Datetime()
                ]);
            if($query){
                return back()->with('okInsert',"Commento pubblicato con successo!");
            }else{
                return back()->with('failInsert',"Errore, qualcosa è andato storto nella pubblicazione del commento");
            }
        }
    }

    public function dropRecensioneFunction(Request $request){
        $request->validate([
            'Commento' => 'required'
        ]);
        $commento=$request->Commento;
        $query = DB::table('recensione')
            ->where('id','=',$commento)
            ->delete();
        if($query){
            return back()->with('successDelete','Un commento è stato eliminato');
        }else{
            return back()->with('failDelete','Qualcosa è andato storto');
        }          
    }
    
    public function modifyCommentFunction(Request $request){
        $commentoModificato = $request->commentModified;
        $oldComment = $request->OldComment;
        $request->validate([
            'commentModified'=>'required|max:255',
            'OldComment'=>'required'
        ]);
        $affected = DB::table('recensione')
          ->where('id', '=', $oldComment)
          ->update(['commento' => $commentoModificato,'updated_at'=>\Carbon\Carbon::now()]);
        if($affected){
            return back()->with('successUpdate','Commento modificato con successo!');
        }else{
            return back()->with('failUpdate','Qualcosa è andato storto, modifica non riuscita. Sei sicuro di aver cambiato qualcosa?');
        }   
    }

    public function newRispostaFunction(Request $request){
        if(session()->has('LoggedUser')){
            $request->validate([
                'commentoId'=>'required',
                'risposta'=>'required'
            ]);
            $query = DB::table("risposta")
                ->insert([
                    'recensione_id'=> $request->commentoId,
                    'user_id'=> session('LoggedUser'),
                    'rispostaCommento'=> $request->risposta
                ]);
            if($query){
                return back()->with('okRisposta',"Risposta pubblicata con successo!");
            }else{
                return back()->with('failRisposta',"Errore, qualcosa è andato storto");
            }
        }
    }  

    public function dropRispostaFunction(Request $request){
        $request->validate([
            'RispostaId' => 'required'
        ]);
        $query = DB::table('risposta')
            ->where('id','=',$request->RispostaId)
            ->delete();
        if($query){
            return back()->with('successDeleteRisposta','La tua risposta al commento è stata eliminata');
        }else{
            return back()->with('failDelete','Qualcosa è andato storto');
        }          
    }
}
