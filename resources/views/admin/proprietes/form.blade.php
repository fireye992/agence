@extends('admin.admin')

@section('title', $propriete->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

    <h1 class="text-3xl text-gray-100">@yield('title')</h1>

    <form class="flex flex-col gap-2 text-gray-100"
        action="{{ route($propriete->exists ? 'admin.propriete.update' : 'admin.propriete.store', $propriete) }}"
        method="post">

        @csrf

        @method($propriete->exists ? 'put' : 'post')

        <div class="flex">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $propriete->title,
            ])
            <div class="flex">
                @include('shared.input', [
                    'class' => 'flex',
                    'name' => 'surface',
                    'value' => $propriete->surface,
                ])
                @include('shared.input', [
                    'class' => 'flex',
                    'label' => 'Prix',
                    'name' => 'prix',
                    'value' => $propriete->prix,
                ])
            </div>
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'name' => 'description',
            'value' => $propriete->description,
        ])
        <div class="flex">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Pieces',
                'name' => 'pieces',
                'value' => $propriete->pieces,
            ])
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Chambres',
                'name' => 'chambres',
                'value' => $propriete->chambres,
            ])
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Etage',
                'name' => 'etage',
                'value' => $propriete->etage,
            ])
        </div>
        <div class="flex">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Adresse',
                'name' => 'adresse',
                'value' => $propriete->adresse,
            ])
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Ville',
                'name' => 'ville',
                'value' => $propriete->ville,
            ])
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Code Postal',
                'name' => 'code_postal',
                'value' => $propriete->code_postal,
            ])
        </div>
        @include('shared.checkbox', ['name' => 'vendu', 'label' => 'Vendu', 'value' => $propriete->vendu])
        <div>
            <button type="submit" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                @if ($propriete->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>