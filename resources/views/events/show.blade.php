@section('head')
    @php
        $isBerlinEvent = !empty($event->city) && strtolower($event->city->slug) === 'berlin';
        $canonicalUrl = $isBerlinEvent
            ? "https://www.berlindeyiz.de/etkinlikler/{$event->slug}"
            : url("/etkinlikler/{$event->slug}");
    @endphp
    <link rel="canonical" href="{{ $canonicalUrl }}">
@endsection

@php
    $isBerlin = str_contains(request()->getHost(), 'berlindeyiz.de');
    $siteName = $isBerlin ? 'Berlindeyiz' : 'Almanyadayız';
    $siteSlogan = $isBerlin ? 'Berlin Rehberi' : 'Almanya\'ya Dair Her Şey';

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

        {{-- Back Link --}}
        <div class="mb-8">
            <a href="{{ route('events.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-orange-500 hover:text-orange-600 transition-colors group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Tüm Etkinliklere Dön
            </a>
        </div>

        {{-- Hero Image --}}
        <div class="relative overflow-hidden rounded-2xl shadow-lg mb-10 aspect-[16/7]">
            <img src="{{ $event->image_path() }}"
                 alt="{{ $event->title }}"
                 class="w-full h-full object-cover">
            {{-- Gradient overlay for bottom info --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

            {{-- Date + City badge --}}
            <div class="absolute bottom-5 left-5 flex gap-3">
                <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-sm font-bold px-4 py-1.5 rounded-full shadow">
                    {{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('d M Y') }}
                </span>
                @if(!empty($event->city))
                    <span class="bg-orange-500/90 backdrop-blur-sm text-white text-sm font-bold px-4 py-1.5 rounded-full shadow">
                        {{ $event->city->name }}
                    </span>
                @endif
            </div>
        </div>

        {{-- Title --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-2 leading-tight">
            {{ $event->title }}
        </h1>
        <div class="h-1 w-14 bg-orange-500 rounded-full mb-6"></div>

        {{-- Info row --}}
        @if($event->address)
            <div class="flex flex-wrap gap-4 mb-8 text-sm text-gray-600">
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-orange-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ $event->address }}, {{ $event->city->name ?? '' }}</span>
                </div>
            </div>
        @endif

        {{-- Action links & keywords --}}
        <x-event-meta :event="$event" />

        {{-- Rich content --}}
        <div class="prose prose-orange max-w-none text-gray-700 mt-8">
            {!! $event->text !!}
        </div>

        {{-- Bottom back link --}}
        <div class="mt-12 pt-8 border-t border-gray-100">
            <a href="{{ route('events.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-orange-500 text-white font-semibold rounded-xl hover:bg-orange-600 transition-colors shadow hover:shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Tüm Etkinliklere Dön
            </a>
        </div>
    </div>

    <x-latest-events />

</x-blog-layout>