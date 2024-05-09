@extends('base')

@section('title', 'Tous nos biens')

@section('content')

<!-- Div écamotable au passage de la souris avec des styles responsives -->
<div x-data="{ open: false }" 
     @mouseenter="open = true" 
     @mouseleave="open = false" 
     class="bg-gray-700 p-2 sm:p-5 mb-5 text-center transition-all duration-300"
     :class="{'h-10 overflow-hidden': !open, 'sm:h-40': open}">
    <form x-show="open" x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0 transform scale-90" 
          x-transition:enter-end="opacity-100 transform scale-100"
          x-transition:leave="transition ease-in duration-300"
          x-transition:leave-start="opacity-100 transform scale-100"
          x-transition:leave-end="opacity-0 transform scale-90"
          action="" method="get" class="flex flex-col sm:flex-row justify-center gap-2">
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
