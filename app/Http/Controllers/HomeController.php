<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index () {
        $proprietes = Propriete::orderBy('created_at','desc')->limit(4)->get();
        return view('home',['proprietes' => $proprietes]);
    }
}
