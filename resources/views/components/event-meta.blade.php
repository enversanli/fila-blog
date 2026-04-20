{{-- Basic SEO --}}
@if($title)
    <title>{{ $title }}</title>
@endif

@if($description)
    <meta name="description" content="{{ $description }}">
@endif

@if(count($keywords) > 0)
    <meta name="keywords" content="{{ implode(',', $keywords) }}">
@endif

{{-- Open Graph / Social --}}
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
@if($event->image ?? false)
    <meta property="og:image" content="https://backend.berlindeyiz.de/storage/{{ $event->image }}">
@endif

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
@if($event->image ?? false)
    <meta name="twitter:image" content="https://backend.berlindeyiz.de/storage/{{ $event->image }}">
@endif

{{-- Action Buttons --}}
@if($ticket || $phone || $mail || $event->address)
    <div class="flex flex-wrap gap-3 my-6">
        @if($ticket)
            <a href="{{ $ticket }}" target="_blank"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-orange-500 text-white text-sm font-semibold rounded-xl hover:bg-orange-600 transition shadow hover:shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
                Bilet Al
            </a>
        @endif
        @if($phone)
            <a href="tel:{{ $phone }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                Ara
            </a>
        @endif
        @if($mail)
            <a href="mailto:{{ $mail }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Mail Gönder
            </a>
        @endif
        @if(!empty($event->address))
            <a href="https://www.google.com/maps/search/{{ urlencode($event->address) }}" target="_blank"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Konumu Görüntüle
            </a>
        @endif
    </div>
@endif

{{-- Keywords Cloud --}}
@if(count($keywords) > 0)
    <div class="flex flex-wrap gap-2 mb-6">
        @foreach($keywords as $keyword)
            <span class="text-xs font-medium bg-orange-50 text-orange-600 border border-orange-100 px-3 py-1 rounded-full hover:bg-orange-100 transition cursor-default">
                {{ $keyword }}
            </span>
        @endforeach
    </div>
@endif