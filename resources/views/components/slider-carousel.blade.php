@if($sliders->count())
    <div id="sliderCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    @if($slider->image)
                        <img src="{{ Storage::disk('sliders')->url($slider->image) }}" class="d-block w-100" alt="{{ $slider->title ?? 'Slider Image' }}">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        @if($slider->title)
                            <h5>{{ $slider->title }}</h5>
                        @endif
                        @if($slider->description)
                            <p>{{ $slider->description }}</p>
                        @endif
                        @if($slider->button)
                            <a href="{{ $slider->button }}" class="btn btn-primary">Learn More</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
@endif
