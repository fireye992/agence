@section('title', 'Toutes les options')
<x-adm-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <table class="w-full text-m text-left rtl:text-right text-gray-500">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $option->name }}</>
                    <td>
                        <div class="flex gap-2 w-full justify-end">
                            <a href="{{ route('admin.option.edit', $option) }}" type="button"
                                class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editer</a>
                            <form action="{{ route('admin.option.destroy', $option) }}" class="action" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 shadow-lg shadow-red-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class='flex justify-center'>
        <div class='w-full max-w-4xl px-4'>
            <div class="flex justify-center space-x-4 mt-3">

                <a href="{{ route('admin.option.create') }}" type="button"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-purple-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Ajouter une option
                </a>
            </div>
        </div>
    </div>

    {{ $options->links() }}
    {{-- @endsection --}}
</x-adm-layout>
