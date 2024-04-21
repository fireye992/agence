@extends('base')

@section('title', $propriete->title)

@section('content')

  <div class="container">
    <h1>{{ $propriete->title }}</h1>
    <h2>{{ $propriete->pieces }} pièces ( {{ $propriete->surface }}) m²</h2>

    <div class="text-blue-500 font-bold text-7xl">
        {{ number_format($propriete->prix, thousands_separator: ' ') }} €
    </div>

    <hr>

    <div class="mt-4">
        <h4>Intéressé par ce bien ?</h4>

        <form action="" method="POST" class="flex flex-col gap-3">
            @csrf
            <div class="w-1/2 p-4 bg-gray-200">
                @include('shared.input', [
                    'class' => 'flex',
                    'label' => 'Nom',
                    'name' => 'lastname',
                ])
                @include('shared.input', [
                    'class' => 'flex',
                    'label' => 'Prénom',
                    'name' => 'firstname',
                ])
            </div>
            <div class="w-1/2 p-4 bg-gray-200">
                @include('shared.input', [
                    'type' => 'numeric',
                    'class' => 'flex',
                    'label' => 'Téléphone',
                    'name' => 'phone',
                ])
                @include('shared.input', [
                    'type' => 'email',
                    'class' => 'flex',
                    'label' => 'Email',
                    'name' => 'email',
                ])
            </div>
                @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'flex',
                    'label' => 'Message',
                    'name' => 'message',
                ])
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Prise de contact
                </button>
            </div>
           
        </form>
    </div>

@endsection

  </div>