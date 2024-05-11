{{-- @extends('admin.admin') --}}
@section('title', $propriete->exists ? 'Editer un bien' : 'Ajouter un bien')

<x-adm-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>


    {{-- @section('content') --}}

    <h1 class="text-3xl text-gray-100">@yield('title')</h1>

    <form class="max-w-md mx-auto"
        action="{{ route($propriete->exists ? 'admin.propriete.update' : 'admin.propriete.store', $propriete) }}"
        method="post" enctype="multipart/form-data">

        @csrf

        @method($propriete->exists ? 'put' : 'post')

        <div class="relative z-0 w-full mb-5 group">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $propriete->title,
            ])
            <div class="grid md:grid-cols-2 md:gap-6">
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
        <div class="relative z-0 w-full mb-5 group">
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
        <div class="relative z-0 w-full mb-5 group">
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
        @include('shared.select', [
            'name' => 'options',
            'label' => 'Options',
            'value' => $propriete->options()->pluck('id'),
            'multiple' => true,
        ])
        @include('shared.checkbox', [
            'class' => 'text-slate-700',
            'name' => 'vendu',
            'label' => 'Vendu',
            'value' => $propriete->vendu,
            'options' => $options,
        ])
        <div class="p-4">
            <div>
                @foreach ($propriete->pictures as $picture)
                    <div>
                        <img src="{{ Storage::url($picture->filename) }}" alt="Image"
                            style="width: 100px; height: auto;">
                        <input type="checkbox" name="delete_pictures[]" value="{{ $picture->id }}"> Supprimer
                    </div>
                @endforeach
                <input type="file" name="pictures[]" multiple>
            </div>
            <button type="submit"
            class="mt-4 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-purple-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            @if ($propriete->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>
</x-adm-layout>
{{-- @endsection --}}
