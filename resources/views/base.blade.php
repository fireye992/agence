<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>@yield('title') | Agence Momoboliere</title>
</head>

<body class="dark:bg-slate-800 antialiased">

    <nav class="flex items-center justify-between flex-wrap bg-gray-900 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <span class="font-semibold text-xl tracking-tight">Clients Dashboard</span>
        </div>
        <div class="block lg:hidden">
            <button id="nav-toggle"
                class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        @php
            $route = request()->route()->getName();
        @endphp
        <div class="hidden w-full flex-grow lg:flex lg:items-center lg:w-auto" id="nav-content">
            <div class="text-sm lg:flex-grow">
                <a href="/"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
                    Home
                </a>
                <a href="{{ route('propriete.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4"
                    @class([
                        'font-bold text-white bg-gray-700' => str_contains($route, 'propriete.'),
                    ])>
                    Biens
                </a>
                <a href="{{ route('admin.propriete.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4"
                    @class([
                        'font-bold text-white bg-gray-700' => str_contains($route, 'propriete.'),
                    ])>
                    Properties
                </a>
                <a href="{{ route('admin.propriete.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 
                    {{ str_contains($route, 'propriete.') ? 'font-bold text-white bg-gray-700' : '' }}">
                    Properties
                </a>


                <a href="{{ route('admin.option.create')  }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4"
                    @class([
                        'nav-link',
                        'font-bold text-white bg-gray-700' => str_contains($route, 'option.'),
                    ])>
                    Creer Options
                </a>

                <a href="{{ route('admin.option.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 
                {{ str_contains($route, 'option.') ? 'font-bold text-white bg-gray-700' : '' }}">
                Options
            </a>

                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white">
                    Contacts
                </a>
            </div>
        </div>
    </nav>


        @yield('content')
  

    <script>
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>

</body>

</html>
