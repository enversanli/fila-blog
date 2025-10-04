<x-blog-layout>
    <div class="max-w-4xl mx-auto px-4 py-12">
        <img src="https://backend.berlindeyiz.de/storage/{{ $event->image ?? 'default.jpg' }}" alt="{{ $event->title }}"
             class="w-full rounded-2xl mb-8 shadow">

        <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $event->title }}</h1>

        <div class="text-sm text-gray-600 mb-6">
            <p><strong>Tarih:</strong> {{ \Carbon\Carbon::parse($event->date_from)->format('d M Y') }}</p>
            @if($event->address)
                <p><strong>Adres:</strong> {{ $event->address }}</p>
            @endif
        </div>

        <div class="prose max-w-none text-gray-700">
            {!! $event->text !!}
        </div>

        <div class="mt-10">
            <a href="{{ route('events.index') }}"
               class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition">
                ← Tüm Etkinliklere Dön
            </a>
        </div>
    </div>
</x-blog-layout>
