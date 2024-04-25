<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProprieteFormRequest;
use App\Models\Option;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

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

        // Vérifier si des fichiers ont été uploadés
        if ($request->hasFile('pictures')) {
            // Récupérer les fichiers sous forme de tableau
            $files = $request->file('pictures');
            // S'assurer que $files n'est pas nul et est un tableau
            if (is_array($files)) {
                $propriete->attachedFiles($files);
            }
        }

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

     public function update(ProprieteFormRequest $request, Propriete $propriete)
     {
         $propriete->update($request->validated());
         $propriete->options()->sync($request->validated('options'));
     
         // Traitement des suppressions d'images
         if ($request->has('delete_pictures')) {
             $pictureIds = $request->input('delete_pictures');
             foreach ($pictureIds as $pictureId) {
                 $picture = Picture::findOrFail($pictureId);
                 Storage::delete($picture->filename); // Assurez-vous de supprimer le fichier du disque
                 $picture->delete(); // Supprimez l'entrée de la base de données
             }
         }
     
         // Gérer les nouveaux fichiers images si nécessaire
         if ($request->hasFile('pictures')) {
             $files = $request->file('pictures');
             $propriete->attachedFiles($files);
         }
     
         return redirect()->route('admin.propriete.index')->with('success', 'Propriété mise à jour avec succès.');
     }

    /**
     * Remove the specified resource from storage.
     */


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
