<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Judge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('dashboard.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judges = Judge::all();
        return view('dashboard.event.create', compact('judges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventData = $this->validate($request, [
            'photo' => 'image|file|max:5200',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string',
        ]);

        if (isset($eventData['photo'])) {
            $eventData['photo'] = $request->photo->store('photo-event');
        }

        Event::create($eventData);
        return redirect()->route('dashboard.event.index')
            ->with('success', 'Event added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $eventData = $this->validate($request, [
            'photo' => 'image|file|max:5200',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string',
        ]);

        if (isset($eventData['photo'])) {
            if ($event->photo) {
                Storage::delete($event->photo);
            }
            $eventData['photo'] = $request->photo->store('photo-event');
        }

        Event::where('id', $event->id)->update($eventData);

        return redirect()->route('dashboard.event.index')
            ->with('success', 'Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->photo) {
            Storage::delete($event->photo);
        }

        Event::destroy($event->id);

        return redirect()->route('dashboard.event.index')
            ->with('success', 'Event deleted!');
    }

    public function listJudges(Event $event)
    {
        return view('dashboard.event.list-judges', [
            'event' => $event,
            'judges' => $event->judges,
            'judgeData' => Judge::all()
        ]);
    }

    public function saveJudges(Request $request, Event $event)
    {
        $event->judges()->attach([
            $request->input('judge')
        ]);

        return redirect()->route('dashboard.event.judges', $event->id)
            ->with('success', 'Juri berhasil ditambah!');
    }

    public function deleteJudge(Request $request, Event $event)
    {
        $judgeId = $request->input('judge');
        $event->judges()->wherePivot('judge_id', '=', $judgeId)->detach();

        return redirect()->route('dashboard.event.judges', $event->id)
            ->with('success', 'Juri berhasil dihapus!');
    }
}
