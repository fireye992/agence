@extends('base')

@section('title', 'Tous nos biens')

@section('content')

<div class="bg-gray-700 p-5 mb-5 text-center">
    <form action="" method="get" class="flex justify-center gap-2">
        <!-- Éléments du formulaire comme les champs de saisie et les boutons -->
        <input type="number" placeholder="Budget Max" class="text-sm p-2 rounded leading-loose" name="prix" value="{{ $input['prix'] ?? '' }}">
        <input type="number" placeholder="Nb de pièces Min" class="text-sm p-2 rounded leading-loose" name="pieces" value="{{ $input['pieces'] ?? '' }}">
        <input type="number" placeholder="Surface Min" class="text-sm p-2 rounded leading-loose" name="surface" value="{{ $input['surface'] ?? '' }}">
        <input placeholder="Nom du bien" class="text-sm p-2 rounded leading-loose" name="title" value="{{ $input['title'] ?? '' }}">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Chercher
        </button>
    </form>
</div>

    <div class="container mx-auto sm:px-4 text-slate-100">
        <div class="flex flex-wrap ">
            @forelse ($proprietes as $propriete)
                <div class="w-full sm:w-1/4 p-4 ">
                    @include('propriete.card')
                </div>
                @empty
                <div class="w-full sm:w-1/4 p-4 ">
                    Rien ne correspond à cette demande
                </div>
            @endforelse
        </div>
        <div class="my-2">
            {{ $proprietes->links() }}
        </div>
    </div>

@endsection
