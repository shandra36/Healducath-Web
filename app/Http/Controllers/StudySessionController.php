<?php

namespace App\Http\Controllers;

use App\Models\StudySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudySessionController extends Controller
{
    public function start()
    {
        return view('study.timer');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mood_id' => 'required',
            'study_duration' => 'required|integer',
            'break_duration' => 'required|integer',
            'session_start' => 'required',
            'session_end' => 'required'
        ]);

        $data['user_id'] = Auth::id();

        StudySession::create($data);

        return redirect()->route('dashboard');
    }
}