<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use App\Models\MoodLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    public function index()
    {
        $moods = Mood::all();
        return view('mood.index', compact('moods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood_id' => 'required|exists:moods,id'
        ]);

        MoodLog::create([
            'user_id' => Auth::id(),
            'mood_id' => $request->mood_id,
            'logged_at' => now()
        ]);

        return redirect()->route('study.start');
    }
}