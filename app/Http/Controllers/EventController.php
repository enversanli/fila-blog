<?php

namespace App\Http\Controllers;

use App\Models\ExternalEvent;

class EventController extends Controller
{
    public function index()
    {
        dd(ExternalEvent::first());
    }
}
