<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\StudySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudySessionController extends Controller
{

    // TIMER DARI TASK
    public function focus(Task $task)
    {
        // ambil durasi dari session (hasil mood)
        $studyDuration = session('studyDuration', 25);

        $breakDuration = $this->calculateBreak($studyDuration);

        return view('study.focus-session', compact(
            'task',
            'studyDuration',
            'breakDuration'
        ));
    }

    // TIMER DARI NAVBAR
    public function start()
    {
        $studyDuration = session('studyDuration', 25);

        $breakDuration = $this->calculateBreak($studyDuration);

        return view('study.focus-session', compact(
            'studyDuration',
            'breakDuration'
        ));
    }

    // SMART SYSTEM: MOOD → DURASI BELAJAR
    public function startSession(Request $request)
    {
        $mood = $request->mood;

        if ($mood == 'semangat') {
            $studyDuration = 180;
        } 
        elseif ($mood == 'biasa') {
            $studyDuration = 120;
        } 
        else {
            $studyDuration = 60;
        }

        // simpan ke session agar task timer ikut pakai
        session([
            'studyDuration' => $studyDuration,
            'mood' => $mood
        ]);

        $breakDuration = $this->calculateBreak($studyDuration);

        return view('study.focus-session', compact(
            'studyDuration',
            'breakDuration'
        ));
    }

    // HITUNG BREAK OTOMATIS
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

    // SIMPAN DATA STUDY SESSION
    public function store(Request $request)
    {
        $data = $request->validate([
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