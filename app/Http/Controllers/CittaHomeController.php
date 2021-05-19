<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citta;
use App\Models\Like;

class CittaHomeController extends Controller
{
    public function datiCitta(){
        $citta = Citta::all();
        $likes = Like::all();
        return view('homepage' , ['cities' => $citta, "likes" => $likes]);
    }
}
