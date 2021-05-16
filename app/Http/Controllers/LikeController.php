<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\support\Facades\DB;

class LikeController extends Controller
{
    public function likeFunction(Request $request){
        if(session()->has('LoggedUser')){
            //controllo se il like esiste gia
            
            //Inserimento like nel db
            $query = DB::table("like")
            ->insert([
                'citta_id'=>$request->CittaId,
                'user_id'=>session('LoggedUser')
            ]);  
        }
        return $request->all();
    }
}
