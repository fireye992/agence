<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProprieteFormRequest;

class ProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.proprietes.index',[
            'proprietes' => Propriete::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propriete = new Propriete();
        return view('admin.proprietes.form', [
            'propriete' => new Propriete()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProprieteFormRequest $request)
    {
        $propriete = Propriete::create($request->validated());
        return to_route('admin.propriete.index')->with('success', 'C\'est créer');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
