<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function store(StoreEventRequest $request):  RedirectResponse
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

    public function index():View
{
    $events = Event::all();

    return view('events.index', compact('events'));
}
public function update(Request $request, Event $event): JsonResponse
{
    $event->update($request->all());

    return response()->json($event, 200);
}
public function destroy(Event $event): Response
{
    $event->delete();

    return response()->noContent();
}
}