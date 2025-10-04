<?php

namespace App\Http\Controllers;

use App\Models\ExternalEvent;

class EventController extends Controller
{
    public function index()
    {
        $events = ExternalEvent::where('approved', 1)
            ->orderBy('date_from', 'desc')
            ->paginate(9);

        return view('events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = ExternalEvent::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }
}
