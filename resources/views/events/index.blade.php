@section('title', "Almanya Geneli Gerçekleşen Türk Konserleri ve Türkçe Etkinlikeri Keşfedin! - Almanyadayız")
@section('description', "Almanya genelinde gerçekleşen 2026 Türk konserleri, festivaller, çocuk etkinlikleri ve daha fazlasını kolayca bulun. Sizde Türk etkinliklerine katılın.")
@section('head')
    <link rel="canonical" href="{{ url('/etkinlikler') }}">
    {{-- Filtered / paginated variants must not compete in search --}}
    @if(request()->hasAny(['city', 'category', 'type', 'price', 'page']))
        <meta name="robots" content="noindex, follow">
    @endif
@endsection

<x-blog-layout>

    {{-- Page Header --}}
    <div class="bg-gradient-to-br from-orange-50 via-white to-amber-50 border-b border-orange-100">
        <div class="max-w-7xl mx-auto px-4 py-14 text-center">
            <span class="inline-block text-xs font-bold tracking-widest uppercase text-orange-500 mb-3">Etkinlikler</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                Tüm Etkinlikler
            </h1>
            <p class="text-gray-500 text-lg max-w-xl mx-auto">
                Almanya genelinde düzenlenen Türk konserlerini, festivalleri ve daha fazlasını keşfedin.
            </p>
            <div class="h-1.5 w-16 bg-orange-500 rounded-full mx-auto mt-6"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">

        <x-event-filter :cities="$cities" :categories="$categories" :types="$types"/>

        @if($events->isEmpty())
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-50 mb-4">
                    <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Etkinlik bulunamadı</h3>
                <p class="text-gray-500 mt-1">Filtrelerinizi değiştirerek tekrar deneyin.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                    @php
                        if (!empty($event->city) && strtolower($event->city->slug) === 'berlin') {
                            $eventUrl = "https://berlindeyiz.de/etkinlikler/{$event->slug}";
                            $isExternal = true;
                        } else {
                            $eventUrl = route('events.show', $event->slug);
                            $isExternal = false;
                        }
                    @endphp

                    <a href="{{ $eventUrl }}"
                       target="{{ $isExternal ? '_blank' : '_self' }}"
                       @if($isExternal) rel="noopener noreferrer" @endif
                       class="group flex flex-col h-full bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                        {{-- Image --}}
                        <div class="relative overflow-hidden aspect-[16/10]">
                            <img src="{{ $event->image_path() }}"
                                 alt="{{ $event->title }}"
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out">

                            {{-- Date Badge --}}
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-gray-800 shadow-sm">
                                {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('d M Y') }}
                            </div>

                            {{-- External badge --}}
                            @if($isExternal)
                                <div class="absolute top-4 right-4 bg-orange-500/90 backdrop-blur-sm px-2 py-1 rounded-lg text-xs font-bold text-white shadow-sm">
                                    Berlin
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-6 flex flex-col flex-1">
                            @if(!empty($event->city))
                                <span class="text-xs font-semibold tracking-wider text-orange-500 uppercase mb-2">
                                    {{ $event->city->name }}
                                </span>
                            @endif

                            <h2 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-orange-500 transition-colors line-clamp-2">
                                {{ $event->title }}
                            </h2>

                            <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">
                                {{ \Illuminate\Support\Str::limit(strip_tags($event->text), 110) }}
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-50 flex items-center text-orange-500 font-semibold text-sm">
                                <span class="group-hover:underline">Detayları Gör</span>
                                <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        <div class="mt-12">
            {{ $events->links() }}
        </div>
    </div>

</x-blog-layout>