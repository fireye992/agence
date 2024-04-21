@extends('base')

@section('title', $propriete->title)

@section('content')

    <div class="container mx-auto sm:px-4 text-white ">
        <h1 class="font-bold text-2xl">{{ $propriete->title }}</h1>
        <h2 class="text-2xl">{{ $propriete->pieces }} pièces - {{ $propriete->surface }} m²</h2>

        <div class="text-purple-500 font-bold text-7xl">
            {{ number_format($propriete->prix, thousands_separator: ' ') }} €
        </div>

        <hr class="mt-4">

        <div class="mt-4">
            <h4 class="mb-4">Intéressé par ce bien ?</h4>

            <form action="" method="POST" class="flex flex-col gap-3">
                @csrf
                <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
                    @include('shared.input', [
                        'class' => 'flex',
                        'label' => 'Nom',
                        'name' => 'lastname',
                    ])
                    @include('shared.input', [
                        'class' => 'flex mt-1 ',
                        'label' => 'Prénom',
                        'name' => 'firstname',
                    ])
                </div>
                <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
                    @include('shared.input', [
                        'type' => 'numeric',
                        'class' => 'flex',
                        'label' => 'Téléphone',
                        'name' => 'phone',
                    ])
                    @include('shared.input', [
                        'type' => 'email',
                        'class' => 'flex mt-1',
                        'label' => 'Email',
                        'name' => 'email',
                    ])
                </div>
                <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
                    @include('shared.input', [
                        'type' => 'textarea',
                        'class' => 'flex',
                        'label' => 'Message',
                        'name' => 'message',
                    ])
                </div>
                <div>
                    <button type="submit" class="bg-purple-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Prise de contact
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-4 ">
            <p>{!! nl2br($propriete->description) !!}</p>
            <div class="mt-4 flex flex-col gap-3">
                <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
                    <h2 class="text-2xl">Caractéristiques</h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $propriete->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Nombre de pièces</td>
                            <td>{{ $propriete->pieces }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de chambres</td>
                            <td>{{ $propriete->chambres }}</td>
                        </tr>
                         <tr>
                            <td>Etage</td>
                            <td>{{ $propriete->etage ?: 'Rdz' }}</td>
                        </tr>
                          <tr>
                            <td>Situation</td>
                            <td>{{ $propriete->code_postal }} - {{ $propriete->ville }}</td>
                        </tr>
                    </table>
                </div>
                <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
                    <h2 class="text-2xl">Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($propriete->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endsection
