@extends('base')

@section('title', 'Tous nos biens')

@section('content')




    <div class="container mx-auto sm:px-4 text-slate-100">
        <div class="flex flex-wrap ">
            @foreach ($proprietes as $propriete)
                <div class="w-full sm:w-1/4 p-4 ">
                    @include('propriete.card')
                </div>
            @endforeach
        </div>
        <div class="my-2">
            {{ $proprietes->links() }}
        </div>
    </div>

@endsection
