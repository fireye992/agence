<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProprieteFormRequest;
use App\Models\Option;
use App\Models\Picture;

class ProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.proprietes.index', [
            'proprietes' => Propriete::orderBy('created_at', 'desc')->withTrashed()->paginate(10)
        ]);
    }
//attention ici j'ai rajouté softdelete et withTrashed, du coup y a un 404 
//si on supprile ce qui aurait du etre supprimer et qui reviens il faut faire un forcedelete plus tard 


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
        $propriete->attachFiles($request->validated('pictures'));
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
    // public function edit(Propriete $propriete)
    // {
    //     return view('admin.proprietes.form', [
    //         'propriete' => $propriete,
    //         'options' => Option::pluck('name', 'id'),
    //     ]);
    // }

    public function edit($id)
{
    $propriete = Propriete::withTrashed()->findOrFail($id);
    return view('admin.proprietes.form', [
        'propriete' => $propriete,
        'options' => Option::pluck('name', 'id'),
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    // public function update(ProprieteFormRequest $request, Propriete $propriete)
    // {
    //     $propriete->update($request->validated());
    //     $propriete->options()->sync($request->validated('options'));
    //     $propriete->attachedFiles($request->validated('pictures'));
    //     return to_route('admin.propriete.index')->with('success', 'C\'est modifié');
    // }

    public function update(ProprieteFormRequest $request, Propriete $propriete)
{
    if ($request->has('restore')) {
        $propriete->restore();
        return redirect()->route('admin.propriete.index')->with('success', 'Propriété restaurée avec succès.');
    }

    $propriete->update($request->validated());
    $propriete->options()->sync($request->validated('options'));
    $propriete->attachedFiles($request->validated('pictures'));
    return redirect()->route('admin.propriete.index')->with('success', 'Propriété mise à jour avec succès.');
}


//     public function update(ProprieteFormRequest $request, $id)
// {
//     // Récupération de la propriété y compris celles qui sont soft deleted
//     $propriete = Propriete::withTrashed()->findOrFail($id);

//     // Si la propriété est supprimée (soft delete), vous pouvez choisir de la restaurer ou de refuser la mise à jour
//     if ($propriete->trashed()) {
//         // Option 1: Restaurer la propriété avant de la mettre à jour
//         $propriete->restore();

//         // Option 2: Refuser la mise à jour et renvoyer un message d'erreur (décommentez pour utiliser)
//         // return redirect()->back()->withErrors('Vous ne pouvez pas mettre à jour une propriété supprimée.');
//     }

//     // Mise à jour de la propriété avec les données validées
//     $propriete->update($request->validated());

//     // Mettre à jour les options associées
//     $propriete->options()->sync($request->validated('options'));

//     // Gestion des fichiers images si nécessaire
//     $propriete->attachedFiles($request->validated('pictures'));

//     // Redirection avec un message de succès
//     return to_route('admin.propriete.index')->with('success', 'C\'est modifié');
// }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Propriete $propriete)
    // {
    //     Picture::destroy($propriete->pictures()->pluck('id'));
    //     $propriete->delete();
    //     return to_route('admin.propriete.index')->with('success', 'C\'est supprimé');
    // }

//     public function destroy(Propriete $propriete)
// {
//     $propriete = Propriete::withTrashed()->findOrFail($id);
//     if ($propriete->trashed()) {
//         $propriete->forceDelete();  // Enlever définitivement
//     } else {
//         $propriete->delete();  // Soft delete
//     }
//     return to_route('admin.propriete.index')->with('success', 'Propriété supprimée.');
// }

public function destroy($id)
{
    $propriete = Propriete::withTrashed()->findOrFail($id);
    if ($propriete->trashed()) {
        $propriete->forceDelete();
    } else {
        $propriete->delete();
    }
    return to_route('admin.propriete.index')->with('success', 'Propriété supprimée.');
}

public function restore($id)
{
    $propriete = Propriete::withTrashed()->findOrFail($id);
    $propriete->restore();
    return redirect()->route('admin.propriete.index')->with('success', 'Propriété restaurée avec succès.');
}


}
