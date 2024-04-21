@extends('base')

@section('content')

<div class="class">
    <div class="container mx-auto sm:px-4 text-white">
        <h1 class="text-2xl mt-4">Agence Ouin Ouin</h1>
        <p class='m-4'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos eveniet quae aliquam quasi ipsum consectetur ea possimus perspiciatis! Consequatur, nostrum et! Doloribus autem, perferendis exercitationem quia magni at tempora eos!</p>
    </div>
</div>

<div class="container mx-auto sm:px-4 text-slate-100" >
    <h2>Nos derniers biens</h2>
    <div class="flex flex-wrap p-2">
        @foreach($proprietes as $propriete)
        <div class="relative flex-grow max-w-full flex-1 px-4">
            @include('propriete.card')
        </div>
        @endforeach
    </div>
</div>
@endsection