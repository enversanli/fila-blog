@if(count($events))
    <div class="container mx-auto px-4 py-12 md:py-16">

        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Son Eklenen Etkinlikler
                </h2>
                <div class="h-1.5 w-20 bg-orange-500 rounded-full mt-3"></div>
            </div>

            <a href="{{ route('events.index') }}"
               class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-orange-500 hover:text-orange-600 transition-colors group">
                Tüm Etkinlikleri Gör
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <a href="{{ url('https://berlindeyiz.de/etkinlikler/' . $event['slug']) }}" target="_blank"
                   class="group flex flex-col h-full bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                    <div class="relative overflow-hidden aspect-[16/10]">
                        @if(!empty($event['logo']))
                            <img src="https://backend.berlindeyiz.de/storage/{{ $event['logo'] }}"
                                 alt="{{ $event['title'] ?? 'Etkinlik' }}"
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out">
                        @else
                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif

                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-gray-800 shadow-sm">
                            {{ $event['readable_date_from'] }}
                            @if(!empty($event['readable_date_to'])) – {{ $event['readable_date_to'] }}@endif
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        @if(!empty($event['address']))
                            <span class="text-xs font-semibold tracking-wider text-orange-500 uppercase mb-2">
                                {{ $event['address'] }}
                            </span>
                        @endif

                        <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-orange-500 transition-colors line-clamp-2">
                            {{ $event['title'] }}
                        </h3>

                        @if(!empty($event['short_desc']))
                            <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">
                                {{ \Illuminate\Support\Str::limit(strip_tags($event['short_desc']), 110) }}
                            </p>
                        @endif

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center text-orange-500 font-semibold text-sm">
                            <span class="group-hover:underline">Görüntüle</span>
                            <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10 text-center md:hidden">
            <a href="{{ route('events.index') }}"
               class="inline-block px-8 py-3 bg-orange-500 text-white font-semibold rounded-full shadow-lg hover:bg-orange-600 hover:shadow-orange-500/30 transition-all text-sm">
                Tüm Etkinlikleri Gör
            </a>
        </div>
    </div>
@else
    <div class="container mx-auto px-4 py-16 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-50 mb-4">
            <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-900">Henüz eklenmiş etkinlik yok</h3>
        <p class="text-gray-500 mt-1">Yakında buraya yeni etkinlikler eklenecektir.</p>
    </div>
@endif