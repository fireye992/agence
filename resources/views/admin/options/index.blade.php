@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')

    <div class='flex justify-between items-center'>
        <h1 class="font-bold text-purple-600 text-5xl ">@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" type="button"
            class="flex justify-end text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Ajouter une option</a>
    </div>

    <table class="w-full text-m text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $option->name }}</>
                    <td>
                        <div class="flex gap-2 w-full justify-end">
                            <a href="{{ route('admin.option.edit', $option) }}" type="button"
                                class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editer</a>
                            <form action="{{ route('admin.option.destroy', $option) }}" class="action" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $options->links() }}
@endsection
