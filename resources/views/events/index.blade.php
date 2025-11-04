@section('title', "Almanya Geneli Gerçekleşen Türk Konserleri ve Türkçe Etkinlikeri Keşfedin! - Almanyadayız")
@section('description', "Almanya genelinde gerçekleşen 2026 Türk konserleri, festivaller, çocuk etkinlikleri ve daha fazlasını kolayca bulun. Sizde Türk etkinliklerine katılın.")

<x-blog-layout>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Tüm Etkinlikler</h1>

        <x-event-filter :cities="$cities" :categories="$categories" :types="$types"/>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                @php
                    // Determine the URL dynamically
                    if(!empty($event->city) && strtolower($event->city->slug) === 'berlin') {
                        $eventUrl = "https://berlindeyiz.de/etkinlikler/{$event->slug}";
                    } else {
                        $eventUrl = route('events.show', $event->slug);
                    }
                @endphp

                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                    <a href="{{ $eventUrl }}" target="{{ strtolower($event->city->slug ?? '') === 'berlin' ? '_blank' : '_self' }}">
                        <img src="{{ $event->image_path() }}" alt="{{ $event->title }}"
                             class="w-full h-56 object-cover">
                        <div class="p-5">
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">{{ $event->title }}</h2>
                            @if(!empty($event->city))
                                <p class="text-sm text-gray-500 mb-2">{{ $event->city->name }}</p>
                            @endif

                            <p class="text-sm text-gray-600 mb-3 line-clamp-3">{!! Str::limit(strip_tags($event->text), 100) !!}</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>{{ \Carbon\Carbon::parse($event->date_from)->format('d M Y') }}</span>
                                <span class="text-orange-500 font-medium">Detaylar →</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $events->links() }}
        </div>
    </div>
</x-blog-layout>
