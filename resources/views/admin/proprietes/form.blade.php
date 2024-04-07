@extends('admin.admin')

@section('title', $propriete->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

    <h1 class="text-3xl">@yield('title')</h1>

    <form class="flex flex-col gap-2"
        action="{{ route($propriete->exists ? 'admin.propriete.update' : 'admin.propriete.store', $propriete) }}"
        method="post">

        @csrf

        @method($propriete->exists ? 'put' : 'post')

        <div class="flex flex-wrap">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $propriete->title,
            ])
            <div class="relative flex-grow max-w-full flex-1 px-4 flex flex-wrap ">
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
                'name' => 'chambres',
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
            <button
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                @if ($propriete->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
