<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeFunction(){
        //PARAMETRI: UTENTE,CITTA
        //logica di business
        return view('homepage');
    }
}
