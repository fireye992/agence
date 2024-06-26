<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- attention y a aussi un admin.blade pour les  fonction admin avec un header different --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>

    <title>@yield('title') | Agence Momoboliere</title>
    
    @livewireStyles
</head>

<body class="dark:bg-slate-800 antialiased">

    {{-- @include('shared.nav') --}}
    {{-- @livewire('navigation-menu') --}}
    @include('nav-gpt')

    @yield('content')

    <script>
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>
    @livewireScripts
</body>

</html>
