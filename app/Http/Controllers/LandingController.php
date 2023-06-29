<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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
        $event = Event::find($id);
        // dd($event); // Add this line to check the retrieved event object
        return view('event', compact('event'));
    }

    public function join($user, $event)
    {
        // Add User and Event to participant_event data
    }
}
