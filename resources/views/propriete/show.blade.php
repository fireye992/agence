@section('title', $propriete->title)
<x-visit-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="container mx-auto sm:px-4 p-4 ">
        {{-- <h1 class="font-bold text-2xl">{{ $propriete->title }}</h1> --}}
        <h2 class=" font-semibold text-3xl">{{ $propriete->pieces }} pièces - {{ $propriete->surface }} m²</h2>

        <div class="font-bold text-5xl">
            {{ number_format($propriete->prix, thousands_separator: ' ') }} €
        </div>
        
        @include('shared.contact')

        <div class="p-3 ">
            <h2 class="text-slate-500 font-semibold text-2xl">{!! nl2br($propriete->description) !!}</h2>
            <div class="mt-4 text-white flex flex-col gap-3">
                <div class="w-1/3 p-2  bg-slate-600 border rounded border-gray-600">
                    <h2 class="text-2xl">Caractéristiques</h2>
                    <table class="min-w-full divide-y divide-gray-500">
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
                <div class="w-1/3 p-2 bg-slate-600 border rounded border-slate-600">
                    <h2 class="text-2xl">Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($propriete->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
</x-visit-layout>
