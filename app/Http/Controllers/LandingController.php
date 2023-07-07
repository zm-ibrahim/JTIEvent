<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ParticipantEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function landing()
    {
        return view('landing');
    }

    public function index()
    {
        $events = Event::latest()->get();
        return view('list', compact('events'));
    }

    public function show($id)
    {
        // $event = Event::find($id);
        // Retrieve the event using the provided ID
        $event = Event::findOrFail($id);
        // dd($event); // Add this line to check the retrieved event object
        return view('event', compact('event'));
    }

    public function joinEvent(Request $request)
    {
        $eventId = $request->input('event_id');
        $participant_id = $request->input('participant_id');

        // Check if the user has already joined the event
        $alreadyJoined = ParticipantEvent::where('participant_id', $participant_id)
            ->where('event_id', $eventId)
            ->exists();

        if ($alreadyJoined) {
            // User has already joined the event
            Session::flash('alert', 'Anda telah mengikuti kegiatan ini sebelumnya.');
        } else {
            // Add the user and event to the participant_event table
            $participantEvent = new ParticipantEvent();
            $participantEvent->participant_id = $participant_id;
            $participantEvent->event_id = $eventId;
            $participantEvent->save();

            Session::flash('success', 'Anda berhasil mengikuti kegiatan ini!');
        }

        return redirect()->back();
    }
}
