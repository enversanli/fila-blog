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

{{-- Open Graph / Social (Optional) --}}
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

{{-- Action Links --}}
@if($ticket || $phone || $mail)
    <div class="flex flex-wrap gap-3 mt-4 mb-4">
        @if($ticket)
            <a href="{{ $ticket }}" target="_blank"
               class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition">
                🎫 Bilet Al
            </a>
        @endif
        @if($phone)
            <a href="tel:{{ $phone }}"
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                📞 Ara
            </a>
        @endif
        @if($mail)
            <a href="mailto:{{ $mail }}"
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                ✉️ Mail Gönder
            </a>
        @endif
            @if(!empty($event->address))
                <a href="https://www.google.com/maps/search/{{ urlencode($event->address) }}" target="_blank"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                    📍 Konumu Görüntüle
                </a>
            @endif
    </div>
@endif

{{-- Keywords Cloud --}}
@if(count($keywords) > 0)
    <div class="mt-4 flex flex-wrap gap-2 mb-4">
        @foreach($keywords as $keyword)
            <span class="text-sm bg-gray-100 px-3 py-1 rounded-full text-gray-700 hover:bg-orange-100 cursor-pointer">
                {{ $keyword }}
            </span>
        @endforeach
    </div>
@endif
