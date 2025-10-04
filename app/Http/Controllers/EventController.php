<?php

namespace App\Http\Controllers;

use App\Models\ExternalEvent;

class EventController extends Controller
{
    public function index()
    {
        $events = ExternalEvent::where('approved', 1)
            ->orderByDesc('sponsored') // 1 → top
            ->orderByRaw("CASE
            WHEN status = 'ACTIVE' THEN 1
            WHEN status = 'UPCOMING' THEN 2
            ELSE 3
        END") // custom sorting by status
            ->orderByDesc('date_from') // newest first
            ->paginate(9);

        return view('events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = ExternalEvent::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }
}
