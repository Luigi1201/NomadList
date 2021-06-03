<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\Citta;
use App\Models\Recensione;
use App\Models\Visita;

class UserAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function newUser(Request $request){
        //controllo di validazione della richiesta
        $request->validate([
            'name'=>'required|unique:users|min:3|max:20',
            'email'=>'required|email|unique:users|max:50',
            'password'=>'required|min:5|max:12'
        ]);
        $query = DB::table("users")
            ->insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);    
        if($query){
            return back()->with('success','Registrazione effettuata con successo');
        }else{
            return back()->with('fail','Qualcosa è andato storto');
        }
    }

    function checkLogin(Request $request){

        //controllo di validazione della richiesta
        $request->validate([
            'email'=>'required|email|max:50',
            'password'=>'required|min:5|max:12'
        ]);
        $user = DB::table('users')
            ->where("email",$request->email)
            ->first();
        
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('LoggedUser',$user->id);
                return redirect('profile');
            }else{
                return back()->with('fail','Password errata');
            }
        }else{
            return back()->with('fail','Non esistono account con questa email');
        }
    }

    function profile(Request $request){
        if(session()->has('LoggedUser')){
            $user = DB::table('users')
                ->where('id',session('LoggedUser'))
                ->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
        }
        $likes = Like::all();
        $cities = Citta::all();
        $recensioni = Recensione::all();
        $visite = Visita::all();
        return view('admin.profile',$data,['likes' => $likes , 'cities' => $cities, 'recensioni' => $recensioni,'visite' => $visite]);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}