<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProprietesRequest;
use App\Models\Propriete;
use Illuminate\Http\Request;

class ProprieteController extends Controller
{
    public function index(SearchProprietesRequest $request)
    {
        $query = Propriete::query();
        if ($request->has('prix')) {
            $query = $query->where('prix','<=', $request->input('prix'));
        }

        return view('propriete.index', [
            'proprietes' => $query->paginate(16)
        ]);
    }

    public function show(string $slug, Propriete $propriete)
    {
        
    }
}
