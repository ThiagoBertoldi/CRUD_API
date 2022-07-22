<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homePage(Request $request){
        return view('home');
    }
}
