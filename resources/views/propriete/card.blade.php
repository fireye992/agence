<div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
    <div class="flex-auto p-6">
        <h5 class="mb-3 text-slate-800">
            <a href="{{ route('propriete.show', ['slug' =>$propriete->getSlug(), 'propriete' => $propriete]) }}">{{ $propriete->title }}</a>
        </h5>
        <p class="mb-0 text-slate-800">{{ $propriete->surface }} m² - {{ $propriete->code_postal }} {{ $propriete->ville }}</p>
        <div class="text-blue-600"> {{ number_format($propriete->prix, thousands_separator: '') }} €
        </div>
    </div>
</div>
