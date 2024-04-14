@extends('base')

@section('content')

<div class="class">
    <div class="container mx-auto sm:px-4 text-white">
        <h1>Agence lorem ipsum</h1>
        <p class>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos eveniet quae aliquam quasi ipsum consectetur ea possimus perspiciatis! Consequatur, nostrum et! Doloribus autem, perferendis exercitationem quia magni at tempora eos!</p>
    </div>
</div>

<div class="container mx-auto sm:px-4 text-slate-100" >
    <h2>Nos derniers biens</h2>
    <div class="flex flex-wrap ">
        @foreach($proprietes as $propriete)
        <div class="relative flex-grow max-w-full flex-1 px-4">
            @include('propriete.card')
        </div>
        @endforeach
    </div>
</div>
@endsection