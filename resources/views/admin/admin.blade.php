<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>@yield('title') | Administration</title>
</head>

<body class="dark:bg-gray-800 antialiased">

    <nav class="flex items-center justify-between flex-wrap bg-gray-900 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <span class="font-semibold text-xl tracking-tight">Admin Dashboard</span>
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
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" id="nav-content">
            <div class="text-sm lg:flex-grow">
                <a href="#responsive-header"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
                    Home
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


                <a href="{{ route('admin.option.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4"
                    @class([
                        'nav-link',
                        'font-bold text-white bg-gray-700' => str_contains($route, 'option.'),
                    ])>
                    Options
                </a>

                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white">
                    Contacts
                </a>
            </div>
        </div>
    </nav>

    <div class='container '>
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded">
                <ul class="my-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>

    <script>
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>

    <script>
        new TomSelect('select[multiple]', {
            plugins: {
                remove_button: {
                    title: 'Supprimer'
                }
            }
        })
    </script>
</body>

</html>
