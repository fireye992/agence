@extends('base')

@section('title', 'Connexion')

@section('content')

    <div class=" p-4  text-white ">

        <h1 class="m-2 text-xl font-semibold">@yield('title')</h1>

        @include('shared.flash')

        <form action="{{ route('login') }}" method="post" >
            @csrf
            @include('shared.input', [
                'type' => 'email',
                'class' => '  ml-2',
                'label' => 'Email',
                'name' => 'email',
            ])
            @include('shared.input', [
                'type' => 'password',
                'class' => '  ml-2' ,
                'label' => 'Mot de passe',
                'name' => 'password',
            ])
            <div class=" p-2">
                <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                    Connexion
                </button>
            </div>
        </form>
        
    </div>

@endsection
