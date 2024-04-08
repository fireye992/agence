<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>@yield('title') | Administration</title>
</head>

<body class="dark:bg-gray-900 antialiased">

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('success') }}
        </div>
    @endif


    <div class='container'>
        @yield('content')
    </div>
</body>

</html>
