<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\DB;
use App\Models\User;

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
            'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        /* METODO1
        se la richiesta è valida:    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();
        */

        // METODO 2 (con query builder)
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

    function check(Request $request){

        //controllo di validazione della richiesta
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        //se la richiesta è valida: 
        // METODO1 $user = User::where('email','=',$request->email)->first();
        
        //METODO2 :
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

    function profile(){
        if(session()->has('LoggedUser')){
            // METODO1 $user = User::where('id','=',session('LoggedUser'))->first();
            //METODO2 : 
            $user = DB::table('users')
                ->where('id',session('LoggedUser'))
                ->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
        }
        return view('admin.profile',$data);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
