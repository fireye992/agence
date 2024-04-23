<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function index () {
    //     $proprietes = Propriete::available()->orderBy('created_at','desc')->limit(4)->get();
    //     return view('home',['proprietes' => $proprietes]);
    // } 
    
    public function index () {
        $proprietes = Propriete::with('pictures')->available()->recent()->limit(4)->get();
        return view('home',['proprietes' => $proprietes]);
    }
}
