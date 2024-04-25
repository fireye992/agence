<div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
    <div class="flex-auto p-6">
        <h5 class="mb-3 text-slate-800">
            <a
                href="{{ route('propriete.show', ['slug' => $propriete->getSlug(), 'propriete' => $propriete]) }}">{{ $propriete->title }}</a>
        </h5>
        <div class="image">
            @foreach ($propriete->pictures as $picture)
                <img src="{{ Storage::url($picture->filename) }}" alt="Image de la propriété">
            @endforeach

        </div>
        <p class="mb-0 text-slate-800">{{ $propriete->surface }} m² - {{ $propriete->code_postal }}
            {{ $propriete->ville }}</p>
        <div class="text-blue-600"> {{ number_format($propriete->prix, thousands_separator: '') }} €
        </div>
        <h1 class="text-purple-800">
                   {{-- Afficher les options --}}
        @if($propriete->options->isNotEmpty())
        <ul>
            @foreach($propriete->options as $option)
                <li>{{ $option->name }}</li> {{-- Assurez-vous que 'name' est le champ correct pour afficher --}}
            @endforeach
        </ul>
    @else
        <p>Sans option.</p>
    @endif
        </h1>
    </div>
</div>
