@section('title', 'Gestionnaire de biens')
<x-adm-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class='w-full max-w-4xl px-4'>
            <!-- Utilisez cette ligne si vous souhaitez réintégrer le titre plus tard -->
            {{-- <h1 class="font-bold text-purple-600 text-5xl mb-5">@yield('title')</h1> --}}
            <div class="flex justify-center space-x-4 mt-3">
                <a href="{{ route('admin.propriete.create') }}" type="button"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Ajouter un bien
                </a>
                <a href="{{ route('admin.option.create') }}" type="button"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Créer une option
                </a>
            </div>
        </div>
    </div>
    

    <table class="w-full text-m text-left rtl:text-right text-gray-500">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">Titre</th>
                <th scope="col" class="px-6 py-3">Surface</th>
                <th scope="col" class="px-6 py-3">Prix</th>
                <th scope="col" class="px-6 py-3">Ville</th>
                <th scope="col" class="text-end p-8">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proprietes as $propriete)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $propriete->title }}</td>
                    <td class="px-6 py-4">{{ $propriete->surface }} m²</td>
                    <td class="px-6 py-4">{{ number_format($propriete->prix, thousands_separator: ' ') }}€</td>
                    <td class="px-6 py-4">{{ $propriete->ville }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2 w-full justify-end">
                            @if ($propriete->trashed())
                                <form action="{{ route('admin.propriete.restore', $propriete->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Restaurer</button>
                                </form>
                            @else
                                <a href="{{ route('admin.propriete.edit', $propriete) }}"
                                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editer</a>
                            @endif
                            <form action="{{ route('admin.propriete.destroy', $propriete) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ $propriete->trashed() ? 'Force Delete' : 'Supprimer' }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

    {{ $proprietes->links() }}
</x-adm-layout>

@extends('admin.admin')

@section('title', 'Tous les biens')

@section('content')
    <div class='flex justify-between items-center'>
        <h1 class="font-bold text-purple-600 text-5xl ">@yield('title')</h1>
        <div class="flex mt-5"> <a href="{{ route('admin.propriete.create') }}" type="button"
                class="flex justify text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Ajouter un bien</a>
            <a href="{{ route('admin.option.create') }}" type="button"
                class="flex justify text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Créer une option</a>
        </div>
    </div>


    <table class="w-full text-m text-left rtl:text-right text-gray-500">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">Titre</th>
                <th scope="col" class="px-6 py-3">Surface</th>
                <th scope="col" class="px-6 py-3">Prix</th>
                <th scope="col" class="px-6 py-3">Ville</th>
                <th scope="col" class="text-end p-8">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proprietes as $propriete)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $propriete->title }}</td>
                    <td class="px-6 py-4">{{ $propriete->surface }} m²</td>
                    <td class="px-6 py-4">{{ number_format($propriete->prix, thousands_separator: ' ') }}€</td>
                    <td class="px-6 py-4">{{ $propriete->ville }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2 w-full justify-end">
                            @if ($propriete->trashed())
                                <form action="{{ route('admin.propriete.restore', $propriete->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Restaurer</button>
                                </form>
                            @else
                                <a href="{{ route('admin.propriete.edit', $propriete) }}"
                                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editer</a>
                            @endif
                            <form action="{{ route('admin.propriete.destroy', $propriete) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ $propriete->trashed() ? 'Force Delete' : 'Supprimer' }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

    {{ $proprietes->links() }}
@endsection
