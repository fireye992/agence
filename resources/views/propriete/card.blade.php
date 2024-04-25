<div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
    <div class="flex-auto p-6">
        <h5 class="mb-3 text-slate-800">
            <a
                href="{{ route('propriete.show', ['slug' => $propriete->getSlug(), 'propriete' => $propriete]) }}">{{ $propriete->title }}</a>
        </h5>
        <div class="relative w-full overflow-hidden">
            <div class="carousel flex transition-transform duration-300">
                @foreach ($propriete->pictures as $picture)
                    <div class="w-full flex-shrink-0 aspect-square overflow-hidden">
                        <img src="{{ Storage::url($picture->filename) }}" class="object-cover w-full h-full" alt="Image de la propriété">
                    </div>
                @endforeach
            </div>
            <button class="carouselPrev absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-900 text-white text-lg p-2 rounded-full hover:bg-gray-700 focus:outline-none">
                <span>&lt;</span>
            </button>
            <button class="carouselNext absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-900 text-white text-lg p-2 rounded-full hover:bg-gray-700 focus:outline-none">
                <span>&gt;</span>
            </button>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousels = document.querySelectorAll('.carousel');

    carousels.forEach(function (carousel) {
        let index = 0;
        const images = carousel.querySelectorAll('div');
        const nextButton = carousel.nextElementSibling;
        const prevButton = nextButton.nextElementSibling;

        nextButton.addEventListener('click', function () {
            index = index + 1 < images.length ? index + 1 : 0;
            carousel.style.transform = `translateX(-${index * 100}%)`;
        });

        prevButton.addEventListener('click', function () {
            index = index - 1 >= 0 ? index - 1 : images.length - 1;
            carousel.style.transform = `translateX(-${index * 100}%)`;
        });
    });
});
</script>