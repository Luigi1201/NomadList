<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RicercaController extends Controller
{
    public function ricercaFunction(Request $richiesta){
        $citta = $richiesta->idCitta;
        return $citta;
    }
}
