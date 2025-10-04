@if($posts->count())
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6">{{ $sectTitle }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
            @foreach($posts as $post)
                <a href="{{ route('filamentblog.post.show', $post->slug) }}"
                   class="block bg-white rounded-xl shadow-md overflow-hidden transition duration-200 hover:shadow-lg flex flex-col h-full">
                    @if($post->cover_photo_path)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover_photo_path) }}"
                             class="w-full h-56 md:h-64 object-cover"
                             alt="{{ $post->title }}">
                    @endif
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-2xl font-semibold mb-2 text-gray-900">{{ $post->title }}</h3>
                        @if($post->sub_title)
                            <p class="text-gray-500 mb-3 text-sm">{{ $post->sub_title }}</p>
                        @endif
                        <p class="text-gray-600 flex-1">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
                        <span class="mt-auto inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-center">
                            Devamını oku
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@else
    <p class="text-gray-500 mt-10 text-center text-lg">Henüz paylaşılmış bir içerik yok.</p>
@endif
