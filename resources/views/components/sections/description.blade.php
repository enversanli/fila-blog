@php
    $isBerlin = request()->getHost() === 'blog.berlindeyiz.de';
@endphp

<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 sm:text-5xl">
                {{ $isBerlin ? 'BerlinDeyiz' : 'AlmanyaDayiz' }}
            </h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                @if($isBerlin)
                    Berlin genelindeki etkinlikleri keşfedin, şehre özel güncel haberleri takip edin ve Berlin’deki sosyal yaşamdan haberdar olun.
                @else
                    Avrupa genelindeki etkinlikleri keşfedin, güncel haberleri takip edin ve Almanya’daki sosyal yaşamdan haberdar olun.
                @endif
            </p>
        </div>

        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition">
                <div class="flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-6">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Etkinlikleri Keşfet</h3>
                <p class="text-gray-600">
                    {{ $isBerlin ? 'Berlin genelindeki konserler, tiyatrolar, sergiler ve yerel festivalleri kolayca bulun.' : 'Berlin, Münih, Hamburg ve Avrupa genelindeki konserler, tiyatrolar ve sergileri kolayca bulun.' }}
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition">
                <div class="flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-6">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Güncel Haberler</h3>
                <p class="text-gray-600">
                    {{ $isBerlin ? 'Berlin’de yaşayanlar için kültürel, sosyal ve şehir haberlerini takip edin.' : 'Almanya ve Avrupa’da yaşayanlar için kültürel, sosyal ve etkinlik haberlerini takip edin.' }}
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition">
                <div class="flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-6">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Kullanışlı Rehberler</h3>
                <p class="text-gray-600">
                    {{ $isBerlin ? 'Berlin ulaşım, konaklama ve semt rehberleri ile şehirde yaşamayı kolaylaştırın.' : 'Etkinlik planlaması, ulaşım ve şehir rehberleri ile Almanya’da yaşamayı kolaylaştırın.' }}
                </p>
            </div>
        </div>
    </div>
</section>
