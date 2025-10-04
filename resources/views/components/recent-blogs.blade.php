@if($posts->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
        @foreach($posts as $post)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                @if($post->cover_photo_path)
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover_photo_path) }}"
                         class="w-full h-56 md:h-64 object-cover"
                         alt="{{ $post->title }}">
                @endif
                <div class="p-5 flex flex-col justify-between h-full">
                    <div>
                        <h3 class="text-2xl font-semibold mb-3 text-gray-900">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
                    </div>
                    <a href="{{ route('filamentblog.post.show', $post->slug) }}"
                       class="mt-auto inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Devamını oku
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-gray-500 mt-10 text-center text-lg">Henüz paylaşılmış bir içerik yok.</p>
@endif
