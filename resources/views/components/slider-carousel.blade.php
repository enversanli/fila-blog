@if($sliders->count())
    <div class="relative w-full">
        <div class="swiper mySwiper w-full h-[60vh] min-h-[500px] md:h-[80vh] lg:max-h-[900px] group">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide relative w-full h-full overflow-hidden bg-gray-900">

                        <div class="absolute inset-0 w-full h-full transition-transform duration-1000" data-swiper-parallax="50%">
                            @if($slider->image)
                                <img src="{{ Storage::disk('sliders')->url($slider->image) }}"
                                     class="w-full h-full object-cover object-center"
                                     alt="{{ $slider->title ?? 'Slider Image' }}">
                            @else
                                <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                                    <span class="text-white/20 text-6xl font-bold">No Image</span>
                                </div>
                            @endif
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>

                        <div class="relative z-20 flex flex-col justify-center items-center h-full text-center px-4 md:px-12 max-w-7xl mx-auto space-y-6">

                            @if($slider->title)
                                <h2 class="text-3xl md:text-5xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-xl
                                           opacity-0 translate-y-12 transition-all duration-1000 delay-300 ease-out
                                           [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0"
                                    data-swiper-parallax="-300">
                                    {{ $slider->title }}
                                </h2>
                            @endif

                            @if($slider->description)
                                <p class="text-lg md:text-2xl text-gray-100 max-w-3xl leading-relaxed font-light drop-shadow-md
                                          opacity-0 translate-y-12 transition-all duration-1000 delay-500 ease-out
                                          [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0"
                                   data-swiper-parallax="-200">
                                    {{ $slider->description }}
                                </p>
                            @endif

                            @if($slider->button)
                                <div class="opacity-0 translate-y-12 transition-all duration-1000 delay-700 ease-out
                                            [.swiper-slide-active_&]:opacity-100 [.swiper-slide-active_&]:translate-y-0"
                                     data-swiper-parallax="-100">
                                    <a href="{{ $slider->button }}"
                                       class="group inline-flex items-center gap-2 px-8 py-4 bg-indigo-600 text-white font-semibold rounded-full shadow-lg shadow-indigo-600/30 hover:bg-indigo-500 hover:scale-105 transition-all duration-300 ring-offset-2 focus:ring-2 ring-indigo-500">
                                        <span>Detayları Görüntüle</span>
                                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-next !hidden md:!flex !w-14 !h-14 !bg-white/10 !backdrop-blur-md !rounded-full !text-white hover:!bg-white/30 transition-all after:!text-2xl hover:scale-110 !right-8"></div>
            <div class="swiper-button-prev !hidden md:!flex !w-14 !h-14 !bg-white/10 !backdrop-blur-md !rounded-full !text-white hover:!bg-white/30 transition-all after:!text-2xl hover:scale-110 !left-8"></div>

            <div class="swiper-pagination !bottom-8 [&_.swiper-pagination-bullet]:!bg-white [&_.swiper-pagination-bullet]:!opacity-50 [&_.swiper-pagination-bullet-active]:!opacity-100 [&_.swiper-pagination-bullet-active]:!w-8 [&_.swiper-pagination-bullet-active]:!rounded-md [&_.swiper-pagination-bullet]:transition-all"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.mySwiper', {
                effect: 'fade',
                fadeEffect: { crossFade: true },
                speed: 1000,
                parallax: true,
                loop: true,
                autoplay: {
                    delay: 6000,
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
        });
    </script>
@endif
