<?php

namespace App\Http\Controllers;

use App\Models\StudySession;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalSessions = StudySession::where('user_id', $user->id)->count();

        $totalStudyTime = StudySession::where('user_id', $user->id)
            ->sum('study_duration');

        $avgStudy = StudySession::where('user_id', $user->id)
            ->avg('study_duration');

        // 🔥 FIX UTAMA (INI YANG KURANG)
        $todayTasks = Task::where('user_id', $user->id)
            ->whereDate('deadline', Carbon::today())
            ->where('is_completed', false)
            ->get();

        return view('dashboard.wellbeing-dashboard', compact(
            'totalSessions',
            'totalStudyTime',
            'avgStudy',
            'todayTasks'
        ));
    }
}