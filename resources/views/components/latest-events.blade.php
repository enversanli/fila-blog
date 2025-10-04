@if(count($events))
    <div class="container mx-auto px-4 mt-10">
        <h2 class="text-3xl font-bold mb-6">Son Eklenen Etkinlikler</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-200 flex flex-col h-full overflow-hidden">

                    <a href="{{ url('https://berlindeyiz.de/etkinlikler/' . $event['slug']) }}" target="_blank" class="block">
                        @if(!empty($event['logo']))
                            <img src="https://backend.berlindeyiz.de/storage/{{ $event['logo'] }}"
                                 alt="{{ $event['title'] ?? 'Etkinlik' }}"
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                Etkinlik Görseli Yok
                            </div>
                        @endif
                    </a>

                    <div class="p-4 flex flex-col flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">{{ $event['title'] }}</h3>
                        @if(!empty($event['short_desc']))
                            <p class="text-gray-600 text-sm mb-3 flex-1 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($event['short_desc']), 100) }}</p>
                        @endif
                        <div class="text-gray-500 text-sm mb-3">
                            <p>{{ $event['readable_date_from'] }} @if(!empty($event['readable_date_to'])) - {{ $event['readable_date_to'] }}@endif</p>
                            <p>{{ $event['address'] ?? '' }}</p>
                        </div>

                        <a href="{{ url('https://berlindeyiz.de/etkinlikler/' . $event['slug']) }}" target="_blank"
                           class="mt-auto inline-block px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 text-center">
                            Görüntüle
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Ortalanmış Tümünü Görüntüle Butonu -->
        <div class="flex justify-center mt-8">
            <a href="{{ route('events.index') }}" target="_blank"
               class="inline-block px-6 py-3 bg-orange-500 text-white font-semibold rounded-lg shadow hover:bg-orange-600 transition">
                Tümünü Görüntüle
            </a>
        </div>

    </div>
@else
    <p class="text-gray-500 mt-10 text-center text-lg">Henüz eklenmiş etkinlik yok.</p>
@endif
