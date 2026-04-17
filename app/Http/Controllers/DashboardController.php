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

        $todayTasks = Task::where('user_id', $user->id)
            ->whereDate('deadline', Carbon::today())
            ->where('is_completed', false)
            ->get();
            
        $weekly = StudySession::where('user_id', $user->id)
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('D');
            });

        $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

        $chartData = [];

        foreach ($days as $day) {
            $chartData[] = isset($weekly[$day])
                ? $weekly[$day]->sum('study_duration')
                : 0;
        }

        return view('dashboard.wellbeing-dashboard', compact(
            'totalSessions',
            'totalStudyTime',
            'avgStudy',
            'todayTasks',
            'chartData'
        ));
    }
}