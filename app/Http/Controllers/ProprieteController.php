<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProprieteContactRequest;
use App\Http\Requests\SearchProprietesRequest;
use App\Mail\ProprieteContactMail;
use App\Models\Propriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProprieteController extends Controller
{
    public function index(SearchProprietesRequest $request)
    {
        $query = Propriete::query()->orderBy('created_at', 'desc');
        if ($prix = $request->validated('prix')) {
            $query = $query->where('prix','<=', $prix);
        }  
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface','>=', $surface);
        }
        if ($pieces = $request->validated('pieces')) {
            $query = $query->where('pieces','>=', $pieces);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title','like', "%{$title}%");
        }

        return view('propriete.index', [
            'proprietes' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Propriete $propriete)
    {
        $expectedSlug = $propriete->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('propriete.show', ['slug' => $expectedSlug, 'propriete' => $propriete]);
        }
        return view('propriete.show', [
            'propriete' => $propriete
        ]);
    }

    public function contact(Propriete $propriete, ProprieteContactRequest $request)
    {
        Mail::send(new ProprieteContactMail($propriete, $request->validated()));
        return back()->with('success', 'Votre demande de prise de contact à été enregistrée');
        // return redirect()->route('propriete.index')->with('success', 'Votre demande de prise de contact a été enregistrée');
    }
}
