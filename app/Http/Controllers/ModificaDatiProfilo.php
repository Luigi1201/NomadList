<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificaDatiProfilo extends Controller
{
    public function modificaNome(Request $request){
        $request->validate([
            'name'=>'required|unique:users|min:3|max:20'
        ]);
        $affected = DB::table('users')
            ->where('id', session('LoggedUser'))
            ->update(['name' => $request->name]);
        if($affected){
            return back()->with('successUsername','Username modificato con successo!');
        }else{
            return back()->with('failUsername','Qualcosa è andato storto');
        }
    }
    public function modificaEmail(Request $request){
        $request->validate([
            'email'=>'required|email|unique:users|max:50'
            
        ]);
        $affected = DB::table('users')
            ->where('id', session('LoggedUser'))
            ->update(['email' => $request->email]);
        if($affected){
            return back()->with('successEmail','Username modificato con successo!');
        }else{
            return back()->with('failEmail','Qualcosa è andato storto');
        }
    }
}
