@section('head')
    <link rel="canonical" href="https://www.berlindeyiz.de/etkinlikler/{{$event->slug}}">
@endsection

@php
    $isBerlin = str_contains(request()->getHost(), 'berlindeyiz.de');
    $siteName = $isBerlin ? 'Berlindeyiz' : 'Almanyadayız';
    $siteSlogan = $isBerlin ? 'Berlin Rehberi' : 'Almanya\'ya Dair Her Şey';

    // Varsayılan anahtar kelimeleri domaine göre seçiyoruz
    $defaultKeywords = $isBerlin
        ? "berlin etkinlikleri, berlin türk etkinlikleri, berlin konserleri, kreuzberg etkinlik, berlin yaşam"
        : "almanya etkinlikleri, almanyada yaşam, türk konserleri almanya, festivaller, gurbetçi rehberi";
@endphp

@section('title', $event->title . ' - ' . $siteSlogan . ' | ' . $siteName)

@section('description', $event->title . ' etkinliğine dair tüm detaylar, bilet satış bilgileri, konum ve daha fazlası ' . $siteName . ' güvencesiyle.')

@section('keywords', $event->meta['keywords'] ?? $defaultKeywords)

@section('og_image', $event->logo)

<x-blog-layout>
    <div class="max-w-4xl mx-auto px-4 py-12">
        <img src="{{ $event->image_path()}}" alt="{{ $event->title }}"
             class="w-full rounded-2xl mb-8 shadow">

        <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $event->title }}</h1>

        <div class="text-sm text-gray-600 mb-6">
            <p><strong>Tarih:</strong> {{ \Carbon\Carbon::parse($event->date_from)->format('d M Y') }}</p>
            @if($event->address)
                <p><strong>Adres:</strong> {{ $event->address }}</p>
                <p><strong>Şehir:</strong> {{ $event->city->name }}</p>
            @endif
        </div>

        <x-event-meta :event="$event" />

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
