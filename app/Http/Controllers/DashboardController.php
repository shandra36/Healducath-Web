<?php

namespace App\Http\Controllers;

use App\Models\StudySession;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalSessions = StudySession::where('user_id',$user->id)->count();

        $totalStudyTime = StudySession::where('user_id',$user->id)
            ->sum('study_duration');

        $avgStudy = StudySession::where('user_id',$user->id)
            ->avg('study_duration');

        return view('dashboard.wellbeing-dashboard', compact(
        'totalSessions',
        'totalStudyTime',
        'avgStudy'
        ));
    }
}