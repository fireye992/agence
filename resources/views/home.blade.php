@section('title','Bienvenue')
<x-visit-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             @yield('title')
        </h2>
    </x-slot>

<div class="class">
    <div class="container mx-auto sm:px-4 text-slate-800">
        <h1 class="text-2xl m-4">Agence Mébouls</h1>
        <p class='m-5'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos eveniet quae aliquam quasi ipsum consectetur ea possimus perspiciatis! Consequatur, nostrum et! Doloribus autem, perferendis exercitationem quia magni at tempora eos!</p>
    </div>
</div>

<div class="container mx-auto sm:px-4 text-slate-100" >
    <h2>Nos derniers biens</h2>
    <div class="flex flex-wrap p-2">
        @foreach($proprietes as $propriete)
        <div class="relative flex-grow max-w-full flex-1 px-4">
            @livewire('propriete.card', ['propriete' => $propriete])
        </div>
        @endforeach
    </div>
</div>
</x-visit-layout>