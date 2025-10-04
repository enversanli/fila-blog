<?php

namespace App\View\Components;

use App\Models\Slider;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderCarousel extends Component
{
    public $sliders;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $today = Carbon::today();

        // Fetch active sliders, optional fields handled in Blade
        $this->sliders = Slider::query()
            ->where(function($query) use ($today) {
                $query->whereNull('start_date')->orWhere('start_date', '<=', $today);
            })
            ->where(function($query) use ($today) {
                $query->whereNull('end_date')->orWhere('end_date', '>=', $today);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider-carousel');
    }
}
