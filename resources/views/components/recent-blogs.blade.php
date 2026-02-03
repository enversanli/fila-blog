@if($posts->count())
    <div class="container mx-auto px-4 py-12 md:py-16">

        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                    {{ $sectTitle }}
                </h2>
                <div class="h-1.5 w-20 bg-blue-600 rounded-full mt-3"></div>
            </div>

            <a href="{{ route('filamentblog.post.all') }}"
               class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors group">
                Tüm İçerikleri Gör
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <a href="{{ route('filamentblog.post.show', $post->slug) }}" class="group flex flex-col h-full bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                    <div class="relative overflow-hidden aspect-[16/10]">
                        @if($post->cover_photo_path)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover_photo_path) }}"
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out"
                                 alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif

                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-gray-800 shadow-sm">
                            {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('d M Y') : 'Yeni' }}
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        @if($post->sub_title)
                            <span class="text-xs tracking-wider mb-2">
                                {{ $post->sub_title }}
                            </span>
                        @endif

                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-blue-600 transition-colors">
                            {{ $post->title }}
                        </h3>

                        <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center text-blue-600 font-medium text-sm">
                            <span class="group-hover:underline">Devamını Oku</span>
                            <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10 text-center md:hidden">
            <a href="{{ route('filamentblog.post.all') }}"
               class="inline-block px-8 py-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 hover:shadow-blue-500/30 transition-all font-semibold text-sm">
                Tüm İçerikleri Gör
            </a>
        </div>
    </div>
@else
    <div class="container mx-auto px-4 py-16 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        </div>
        <h3 class="text-lg font-medium text-gray-900">Henüz içerik bulunmuyor</h3>
        <p class="text-gray-500 mt-1">Yakında buraya yeni yazılar eklenecektir.</p>
    </div>
@endif
