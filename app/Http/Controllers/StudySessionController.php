<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\StudySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StudySessionController extends Controller
{

    public function focus(Task $task)
    {
        $studyDuration = session('studyDuration', 25);
        $breakDuration = $this->calculateBreak($studyDuration);

        return view('study.focus-session', compact(
            'task',
            'studyDuration',
            'breakDuration'
        ));
    }

    public function start()
    {
        $studyDuration = session('studyDuration', 25);
        $breakDuration = $this->calculateBreak($studyDuration);

        return view('study.focus-session', compact(
            'studyDuration',
            'breakDuration'
        ));
    }

    public function startSession(Request $request)
    {
        $mood = $request->mood;

        if ($mood == 'semangat') {
            $studyDuration = 180;
            $mood_id = 1;
        } 
        elseif ($mood == 'biasa') {
            $studyDuration = 120;
            $mood_id = 2;
        } 
        else {
            $studyDuration = 60;
            $mood_id = 3;
        }

        session([
            'studyDuration' => $studyDuration,
            'mood_id' => $mood_id
        ]);

        $breakDuration = $this->calculateBreak($studyDuration);

        return view('study.focus-session', compact(
            'studyDuration',
            'breakDuration'
        ));
    }

    private function calculateBreak($studyDuration)
    {
        if ($studyDuration <= 30) {
            return 5;
        }

        if ($studyDuration <= 90) {
            return 10;
        }

        return 15;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'study_duration' => 'required|integer',
            'break_duration' => 'required|integer',
            'session_start' => 'required',
            'session_end' => 'required'
        ]);

        $data['user_id'] = Auth::id();

        $data['mood_id'] = session('mood_id') ?? 1;

        $data['session_start'] = Carbon::parse($data['session_start'])->format('Y-m-d H:i:s');
        $data['session_end'] = Carbon::parse($data['session_end'])->format('Y-m-d H:i:s');

        StudySession::create($data);

        return redirect()->route('progress');
    }
}