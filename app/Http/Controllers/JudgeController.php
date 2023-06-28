<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ParticipantEvent;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JudgeController extends Controller
{
    public function events()
    {
        $events = Auth::user()->judge->events()->paginate(5);
        return view('dashboard.event.judge.judge-event', compact('events'));
    }

    public function eventParticipants(int $id)
    {
        $scores = Score::where('judge_id', Auth::user()->judge->id);
        $participants = ParticipantEvent::where('event_id', $id)
            ->with([
                'participant' => function ($query) {
                    $query->select('id', 'full_name', 'school_name');
                },
                'event' => fn ($query) =>
                $query->select('id', 'name'),
                'scores' => function ($query) {
                    $query->where('judge_id', Auth::user()->judge->id)->limit(1);
                }
            ])
            ->chunkMap(function ($data) {
                $data->score = $data->scores()->where('judge_id', Auth::user()->judge->id)->first()->score ?? null;
                return $data;
            });
        $event = Event::select('name')->where('id', $id)->first();
        return view('dashboard.event.judge.event-participant', compact('event', 'participants'));
    }

    public function giveScore(Request $request, int $id)
    {
        $scoreData = $this->validate($request, [
            'score' => 'required|integer|max:100|min:0'
        ]);
        $scoreData['participant_event_id'] = $id;
        $scoreData['judge_id'] = Auth::user()->judge->id;

        Score::create($scoreData);

        return redirect()->back()->with('success', 'Nilai berhasil ditambahkan!');
    }
}
