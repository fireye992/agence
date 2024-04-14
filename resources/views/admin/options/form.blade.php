@extends('admin.admin')

@section('title', $option->exists ? 'Editer une bien' : 'Créer une option')

@section('content')

    <h1 class="text-3xl text-gray-100">@yield('title')</h1>

    <form class="max-w-md mx-auto"
        action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}"
        method="post">

        @csrf

        @method($option->exists ? 'put' : 'post')

    @include('shared.input', ['name' => 'name', 'label' => 'Nom' , 'value'=> $option ->name])

        <div>
            <button type="submit" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                @if ($option->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
    @endsection