<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use Illuminate\Http\Request;

class ProprieteController extends Controller
{
    public function index()
    {
        $proprietes = Propriete::paginate(16);
        return view('propriete.index', [
            'proprietes' => $proprietes
        ]);
    }

    public function show(string $slug)
    {
        
    }
}
