@extends('admin.admin')

@section('title', $propriete->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

    <h1 class="text-3xl">@yield('title')</h1>

    <form action="{{ route($propriete->exists ? 'admin.propriete.update' : 'admin.propriete.store', $propriete) }}"
        method="post">

        @csrf

        @method($propriete->exists ? 'put' : 'post')

        <div class="flex flex-wrap ">
            @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $propriete->title])
        <div class="relative flex-grow max-w-full flex-1 px-4 flex flex-wrap ">
            @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $propriete->surface])           
        </div>
        </div>

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
