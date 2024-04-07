@extends('admin.admin')

@section('title', 'Tous les biens')

@section('content')
    <div class='flex justify-between items-center'>
        <h1 class=" font-bold text-blue-600 text-5xl te">@yield('title')</h1>
        <a href="{{ route('admin.propriete.create') }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
            Ajouter un bien</a>
    </div>

    <table class="w-full max-w-full mb-4 bg-transparent">
        <thead>
            <tr>
                <th class='border p-8 border-slate-600'>Titre</th>
                <th class='border p-8 border-slate-600'>Surface</th>
                <th class='border p-8 border-slate-600'>Prix</th>
                <th class='border p-8 border-slate-600'>Ville</th>
                <th class="text-end p-8">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proprietes as $propriete)
                <tr>
                    <td>{{ $propriete->title }}</td>
                    <td>{{ $propriete->surface }}m²</td>
                    <td>{{ number_format($propriete->prix, thousands_separator: ' ') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
