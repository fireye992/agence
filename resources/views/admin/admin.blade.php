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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>

    <title>@yield('title') | Administration</title>

    @livewireStyles
</head>

<body class="dark:bg-gray-800 antialiased">

    @include('nav-gpt')

    <div class='container p-2'>

        @include('shared.flash')

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
    @livewireScripts
</body>

</html>
