<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $eventData = $request->validate([
            'name' => 'required|string|max:60',
            'featured' => 'required|string|max:50',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'required|string|max:60',
        ]);

        Event::create($eventData);

        return redirect()->route('events.index');
    }

    public function index()
    {
        return 'Lista de eventos';
    }
}