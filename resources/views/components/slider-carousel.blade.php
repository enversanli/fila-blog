@if($sliders->count())
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide relative h-96 md:h-[500px] lg:h-[600px] overflow-hidden">
                    @if($slider->image)
                        <img src="{{ Storage::disk('sliders')->url($slider->image) }}"
                             class="w-full h-full object-cover"
                             alt="{{ $slider->title ?? 'Slider Image' }}">
                    @endif
                    <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-30 text-white p-4 text-center">
                        @if($slider->title)
                            <h2 class="text-2xl md:text-4xl font-bold mb-2">{{ $slider->title }}</h2>
                        @endif
                        @if($slider->description)
                            <p class="mb-4">{{ $slider->description }}</p>
                        @endif
                        @if($slider->button)
                            <a href="{{ $slider->button }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white">Learn More</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.mySwiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 1,
            });
        });
    </script>
@endif
