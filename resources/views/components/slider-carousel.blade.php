@if($sliders->count())
    <div class="relative w-full">
        <div class="swiper mySwiper w-full h-[60vh] min-h-[500px] md:h-[80vh] lg:max-h-[900px] group">
            <div class="swiper-wrapper">
                @foreach($sliders as $index => $slider)
                    <div class="swiper-slide relative w-full h-full overflow-hidden bg-gray-900">

                        {{-- Parallax background image --}}
                        <div class="absolute inset-0 w-full h-full transition-transform duration-1000" data-swiper-parallax="50%">
                            @if($slider->image)
                                <img src="{{ Storage::disk('sliders')->url($slider->image) }}"
                                     class="w-full h-full object-cover object-center scale-105"
                                     alt="{{ $slider->title ?? 'Slider görseli' }}">
                            @else
                                <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                                    <span class="text-white/20 text-6xl font-bold">Görsel Yok</span>
                                </div>
                            @endif
                        </div>

                        {{-- Multi-directional gradient for legibility --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/20 z-10"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent z-10"></div>

                        {{-- Slide content --}}
                        <div class="relative z-20 flex flex-col justify-end md:justify-center h-full px-6 md:px-16 lg:px-24 pb-24 md:pb-0 max-w-5xl">

                            {{-- Slide number label --}}
                            <div class="opacity-0 translate-y-6 transition-all duration-700 delay-100 ease-out
                                        [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0
                                        mb-4">
                                <span class="text-xs font-bold tracking-widest uppercase text-white/60">
                                    Etkinlik {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>

                            @if($slider->title)
                                <h2 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight drop-shadow-xl leading-tight
                                           opacity-0 translate-y-10 transition-all duration-700 delay-200 ease-out
                                           [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0"
                                    data-swiper-parallax="-300">
                                    {{ $slider->title }}
                                </h2>
                            @endif

                            @if($slider->description)
                                <p class="mt-4 text-base md:text-xl text-gray-200 max-w-2xl leading-relaxed font-light drop-shadow-md
                                          opacity-0 translate-y-10 transition-all duration-700 delay-350 ease-out
                                          [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0"
                                   data-swiper-parallax="-200">
                                    {{ $slider->description }}
                                </p>
                            @endif

                            @if($slider->button)
                                <div class="mt-8 opacity-0 translate-y-10 transition-all duration-700 delay-500 ease-out
                                            [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0"
                                     data-swiper-parallax="-100">
                                    <a href="{{ $slider->button }}"
                                       class="group/btn inline-flex items-center gap-2 px-8 py-3.5 bg-orange-500 text-white font-semibold rounded-full shadow-lg shadow-orange-500/30 hover:bg-orange-400 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent">
                                        <span>Detayları Görüntüle</span>
                                        <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Navigation buttons --}}
            <div class="swiper-button-prev !hidden md:!flex !w-12 !h-12 !bg-white/10 !backdrop-blur-md !rounded-full !text-white hover:!bg-white/25 !transition-all after:!text-lg !left-6 !border !border-white/20 hover:!border-white/40"></div>
            <div class="swiper-button-next !hidden md:!flex !w-12 !h-12 !bg-white/10 !backdrop-blur-md !rounded-full !text-white hover:!bg-white/25 !transition-all after:!text-lg !right-6 !border !border-white/20 hover:!border-white/40"></div>

            {{-- Dot pagination --}}
            <div class="swiper-pagination !bottom-10 md:!bottom-8
                        [&_.swiper-pagination-bullet]:!bg-white [&_.swiper-pagination-bullet]:!opacity-40
                        [&_.swiper-pagination-bullet-active]:!opacity-100
                        [&_.swiper-pagination-bullet-active]:!w-7 [&_.swiper-pagination-bullet-active]:!rounded-full
                        [&_.swiper-pagination-bullet]:!transition-all [&_.swiper-pagination-bullet]:!duration-300">
            </div>

            {{-- Slide counter (top-right) --}}
            <div class="absolute top-6 right-6 z-30 hidden md:flex items-center gap-2 text-white/70 text-sm font-mono select-none">
                <span class="swiper-slide-counter font-bold text-white">01</span>
                <span class="text-white/40">/</span>
                <span>{{ str_pad($sliders->count(), 2, '0', STR_PAD_LEFT) }}</span>
            </div>

            {{-- Autoplay progress bar --}}
            <div class="absolute bottom-0 left-0 right-0 z-30 h-0.5 bg-white/10">
                <div class="swiper-progress-bar w-full h-full bg-orange-500 origin-left" style="transform: scaleX(0)"></div>
            </div>

            {{-- Scroll hint --}}
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-30 hidden md:flex flex-col items-center gap-1 text-white/40 pointer-events-none select-none"
                 style="bottom: 2.5rem;">
                <span class="text-[10px] tracking-widest uppercase">Kaydır</span>
                <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const progressBar = document.querySelector('.swiper-progress-bar');
            const counter = document.querySelector('.swiper-slide-counter');

            const swiper = new Swiper('.mySwiper', {
                effect: 'fade',
                fadeEffect: { crossFade: true },
                speed: 800,
                parallax: true,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Progress bar — driven by Swiper's own autoplayTimeLeft event (fires every frame).
            // progress: 1.0 = just started, 0.0 = about to advance.
            swiper.on('autoplayTimeLeft', function (s, timeLeft, progress) {
                if (progressBar) {
                    progressBar.style.transform = `scaleX(${1 - progress})`;
                }
            });

            // Slide counter
            function updateCounter() {
                if (!counter) return;
                counter.textContent = String(swiper.realIndex + 1).padStart(2, '0');
            }

            swiper.on('slideChange', updateCounter);
            updateCounter();
        });
    </script>
@endif