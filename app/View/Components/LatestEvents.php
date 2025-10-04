<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class LatestEvents extends Component
{
    public $events;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Replace with full URL if needed
        $endpoint = url('https://backend.berlindeyiz.de/api/activities/son-eklenenler?count=6');

        // Fetch JSON data from the endpoint
        $response = Http::get($endpoint);
        $this->events = [];

        if ($response->successful()) {
            $json = $response->json();
            if (isset($json['data']) && is_array($json['data'])) {
                $this->events = $json['data'];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.latest-events');
    }
}
