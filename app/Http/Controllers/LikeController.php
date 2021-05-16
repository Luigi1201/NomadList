<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeFunction(Request $request){
        return $request->all();
    }
}
