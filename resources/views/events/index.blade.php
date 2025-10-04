<x-blog-layout>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Tüm Etkinlikler</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                    <a href="{{ route('events.show', $event->slug) }}">
                        <img src="https://backend.berlindeyiz.de/storage/{{$event->image ?? 'default.jpg' }}" alt="{{ $event->title }}"
                             class="w-full h-56 object-cover">
                        <div class="p-5">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $event->title }}</h2>
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
