<?php

namespace App\Http\Controllers;

use App\Models\ParticipantEvent;
use Illuminate\Http\Request;

class ParticipantEventController extends Controller
{
    public function store(Request $request)
    {
        // Retrieve user ID and event ID from the request
        $userId = $request->user_id;
        $eventId = $request->event_id;

        // Add user and event to participant_event table
        $participantEvent = new ParticipantEvent();
        $participantEvent->user_id = $userId;
        $participantEvent->event_id = $eventId;
        $participantEvent->save();

        // Redirect or return a response as needed
    }
}
