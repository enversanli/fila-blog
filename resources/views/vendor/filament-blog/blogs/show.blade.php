@php
    $isBerlin = str_contains(request()->getHost(), 'berlindeyiz.de');
    $siteName = $isBerlin ? 'BerlinDeyiz' : 'AlmanyaDayız';
    $siteSlogan = $isBerlin ? 'Berlin Rehberi' : 'Almanya\'ya Dair Her Şey!';

    $defaultDesc = $isBerlin
        ? "BerlinDeyiz; Berlin'deki etkinlikleri, şehre özel güncel haberleri ve faydalı rehberleri Türkçe sunar. Berlin yaşamını bizimle keşfedin!"
        : "AlmanyaDayız; Almanya ve Avrupa genelindeki etkinlikleri, güncel haberleri ve faydalı içerikleri Türkçe sunar. Konserler ve rehberleri keşfedin!";
@endphp

@section('title', ($post->seoDetail->title ?? $post->title) . " - " . $siteSlogan)

@section('description', $post->seoDetail->description ?? $defaultDesc)

@section('keywords', isset($post->seoDetail->keywords) && !is_null($post->seoDetail->keywords) ? implode(',', $post->seoDetail->keywords) : 'almanya, haberler, etkinlikler, rehber, ' . ($isBerlin ? 'berlin' : 'avrupa'))

@section('og_image', \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover_photo_path))
<x-blog-layout>
    <section class="pb-16">
        <div class="container mx-auto px-4 lg:px-0">
            <div class="mb-6 md:mb-10 flex flex-wrap items-center gap-x-2 gap-y-2 text-sm font-semibold">
                <a href="{{ route('filamentblog.post.index') }}" class="opacity-60 whitespace-nowrap">Anasayfa</a>
                <span class="opacity-30">/</span>
                <a href="{{ route('filamentblog.post.all') }}" class="opacity-60 whitespace-nowrap">Blog</a>
                <span class="opacity-30">/</span>
                <a title="{{ $post->slug }}" href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="hover:text-primary-600 max-w-[200px] md:max-w-2xl truncate font-medium transition-all duration-300">
                    {{ $post->title }}
                </a>
            </div>

            <div class="mx-auto mb-20 space-y-10">
                <div class="flex flex-col lg:grid gap-y-10 lg:gap-x-12 xl:gap-x-20 lg:grid-cols-[minmax(min-content,10%)_1fr_minmax(min-content,10%)]">

                    <div class="py-5 order-2 lg:order-1 flex justify-center lg:block">
                        <div class="sticky top-24 flex flex-row lg:flex-col items-center gap-6 lg:gap-y-5 lg:divide-y-2 lg:divide-x-0">
                            <button x-data="" x-on:click="document.getElementById('comments').scrollIntoView({ behavior: 'smooth'})" class="group/btn flex flex-col items-center justify-center gap-y-2">
                                <div class="flex items-center justify-center rounded-full bg-slate-100 px-4 py-4 group-hover/btn:bg-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M13 11H7a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2m4-4H7a1 1 0 0 0 0 2h10a1 1 0 0 0 0-2m2-5H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h11.59l3.7 3.71A1 1 0 0 0 21 22a.84.84 0 0 0 .38-.08A1 1 0 0 0 22 21V5a3 3 0 0 0-3-3m1 16.59l-2.29-2.3A1 1 0 0 0 17 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1Z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-semibold">Yorumlar</span>
                            </button>
                            <div class="pt-0 lg:pt-5">
                                {!! $shareButton?->html_code !!}
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 md:space-y-10 order-1 lg:order-2 w-full overflow-hidden">
                        <div>
                            <div class="flex flex-col justify-end">
                                <div class="mb-6 w-full overflow-hidden rounded bg-slate-200">
                                    <img class="flex w-full h-64 md:h-[400px] items-center justify-center object-cover object-top text-sm font-semibold text-slate-400" src="{{ $post->featurePhoto }}" alt="{{ $post->photo_alt_text }}">
                                </div>

                                <div class="mb-6">
                                    <h1 class="mb-4 text-2xl md:text-4xl font-semibold leading-tight">
                                        {{ $post->title }}
                                    </h1>
                                    <p class="text-gray-600 mb-4">{{ $post->sub_title }}</p>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        @foreach ($post->categories as $category)
                                            <a href="{{ route('filamentblog.category.post', ['category' => $category->slug]) }}">
                                                <span class="bg-primary-200 text-primary-800 inline-flex rounded-full px-3 py-1 text-xs font-semibold">{{ $category->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-5 flex items-center justify-between gap-x-3 py-4 md:py-5 border-y border-slate-100">
                                    <div class="flex items-center gap-4">
                                        <img class="h-12 w-12 md:h-14 md:w-14 overflow-hidden rounded-full border-2 md:border-4 border-white bg-zinc-300 object-cover text-[0] ring-1 ring-slate-300" src="{{ $post->user->avatar }}" alt="{{ $post->user->name() }}">
                                        <div>
                                            <span title="{{ $post->user->name() }}" class="block max-w-[150px] md:max-w-[200px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold">{{ $post->user->name() }}</span>
                                            <span class="block whitespace-nowrap text-xs md:text-sm font-semibold text-zinc-500">
                                                {{ $post->formattedPublishedDate() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <article class="m-auto leading-relaxed w-full break-words prose prose-sm md:prose-base max-w-none">
                                        {!! tiptap_converter()->asHTML($post->body, toc: true, maxDepth: 3) !!}
                                    </article>

                                    @if($post->tags->count())
                                        <div class="pt-10">
                                            <span class="mb-3 block font-semibold">Etiketler</span>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($post->tags as $tag)
                                                    <a href="{{ route('filamentblog.tag.post', ['tag' => $tag->slug]) }}" class="rounded-full border border-slate-300 px-3 py-1 text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors">
                                                        {{ $tag->name }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div id="comments">
                            @if($post->comments->count())
                                <div class="border-t-2 py-8 md:py-10">
                                    <div class="mb-4">
                                        <h3 class="mb-2 text-xl md:text-2xl font-semibold">Yorumlar</h3>
                                    </div>
                                    <div class="flex flex-col gap-y-6 divide-y divide-slate-100">
                                        @foreach($post->comments as $comment)
                                            <article class="pt-4 text-sm md:text-base">
                                                <div class="mb-3 flex items-center gap-3 md:gap-4">
                                                    <img class="h-10 w-10 md:h-14 md:w-14 overflow-hidden rounded-full border-2 border-white bg-zinc-300 object-cover text-[0] ring-1 ring-slate-300" src="{{ asset($comment->user->avatar) }}" alt="avatar">
                                                    <div>
                                                <span class="block max-w-[150px] md:max-w-[200px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold">
                                                    {{ $comment->user->{config('filamentblog.user.columns.name')} }}
                                                </span>
                                                        <span class="block whitespace-nowrap text-xs md:text-sm font-medium text-zinc-500">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </span>
                                                    </div>
                                                </div>
                                                <p class="text-gray-600 break-words">
                                                    {{ $comment->comment }}
                                                </p>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <x-blog-comment :post="$post" />
                        </div>
                    </div>

                    <div class="order-3 lg:order-3">
                        {{-- Ads Section --}}
                        {{-- <div class="sticky top-24 flex h-[600px] w-full lg:w-[160px] items-center justify-center overflow-hidden rounded bg-slate-200 font-medium text-slate-500/20">--}}
                        {{-- <span>ADS</span>--}}
                        {{-- </div>--}}
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200 pt-10 mt-10">
                <div class="relative mb-6 flex items-center gap-x-4 md:gap-x-8">
                    <h2 class="whitespace-nowrap text-lg md:text-xl font-semibold">
                        <span class="text-primary font-bold">#</span> Benzer İçerikler
                    </h2>
                    <div class="flex w-full items-center">
                        <span class="h-0.5 w-full rounded-full bg-slate-200"></span>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-x-8 lg:gap-x-12 gap-y-10">
                    @forelse($post->relatedPosts() as $post)
                        <x-blog-card :post="$post" />
                    @empty
                        <div class="col-span-1 sm:col-span-2 md:col-span-3">
                            <p class="text-center text-lg md:text-xl font-semibold text-gray-400">Benzer İçerik Bulunamadı.</p>
                        </div>
                    @endforelse
                </div>

                <div class="flex justify-center pt-12 md:pt-20">
                    <a href="{{ route('filamentblog.post.all') }}" class="flex items-center justify-center gap-x-3 md:gap-x-5 rounded-full bg-slate-100 px-8 md:px-20 py-3 md:py-4 text-sm font-semibold transition-all duration-300 hover:bg-slate-200">
                        <span>Tümünü Görüntüle</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 md:w-6" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6m0 0H9m9 0v9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {!! $shareButton?->script_code !!}
</x-blog-layout>
