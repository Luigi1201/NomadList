<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citta;

class CittaHomeController extends Controller
{
    public function datiCitta(){
        $citta = Citta::all();
        return view('homepage' , ['cities' => $citta]);
    }
}
