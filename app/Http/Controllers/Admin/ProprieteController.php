<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProprieteFormRequest;
use App\Models\Option;

class ProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.proprietes.index', [
            'proprietes' => Propriete::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propriete = new Propriete();
        $propriete->fill([

            'title' => 'Titre',
            'description' =>  'Description',
            'surface' => 45,
            'pieces' => 2,
            'chambres' => 1,
            'etage' => 0,
            'prix' => 200000,
            'adresse' => 'Adresse',
            'ville' => 'Strasbourg',
            'code_postal' => '67000',
        ]);
        return view('admin.proprietes.form', [
            'propriete' => $propriete,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProprieteFormRequest $request)
    {
        $propriete = Propriete::create($request->validated());
        $propriete->options()->sync($request->validated('options'));
        return to_route('admin.propriete.index')->with('success', 'C\'est créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propriete $propriete)
    {
        return view('admin.proprietes.form', [
            'propriete' => $propriete,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProprieteFormRequest $request, Propriete $propriete)
    {
        $propriete->update($request->validated());
        $propriete->options()->sync($request->validated('options'));
        return to_route('admin.propriete.index')->with('success', 'C\'est modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propriete $propriete)
    {
        $propriete->delete();
        return to_route('admin.propriete.index')->with('success', 'C\'est supprimé');
    }
}
