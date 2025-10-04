<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\ExternalCities;
use App\Models\ExternalEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = ExternalEvent::approved()
            ->with(['city', 'category', 'type'])
            ->orderByDesc('sponsored')
            ->orderByRaw("FIELD(status, 'ACTIVE', 'UPCOMING', 'OUT_OF_DATE')")
            ->orderByDesc('date_from');

        if ($request->filled('city')) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('slug', $request->city)
                    ->orWhere('id', $request->city);
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category)
                    ->orWhere('id', $request->category);
            });
        }

        if ($request->filled('type')) {
            $query->whereHas('type', function ($q) use ($request) {
                $q->where('slug', $request->type)
                    ->orWhere('id', $request->type);
            });
        }

        $events = $query->paginate(9)->appends($request->query());

        // Fetch filter data for dropdowns
        $cities = ExternalCities::orderBy('name')->get();
        $categories = EventCategory::orderBy('name')->get();
        $types = EventType::orderBy('name')->get();

        return view('events.index', compact('events', 'cities', 'categories', 'types'));
    }


    public function show($slug)
    {
        $event = ExternalEvent::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }
}
