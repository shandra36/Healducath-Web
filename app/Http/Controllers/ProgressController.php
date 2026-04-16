<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\StudySession;
use Carbon\Carbon;

class ProgressController extends Controller
{

public function index()
{

$user = Auth::id();

$sessions = StudySession::where('user_id',$user)->get();

$today = $sessions->whereBetween('created_at',[Carbon::today(),Carbon::tomorrow()]);

$totalStudy = $today->sum('study_duration');

$totalBreak = $today->sum('break_duration');

$studyHours = round($totalStudy / 60,1);

$focusLevel = $totalStudy > 0 ? round(($totalStudy / ($totalStudy + $totalBreak))*100) : 0;

$breakBalance = $totalStudy > 0 ? round(($totalBreak / $totalStudy)*100) : 0;



$weeklyData = [];

$days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

foreach($days as $day){

$value = $sessions
->filter(fn($s)=>Carbon::parse($s->created_at)->format('D')==$day)
->sum('study_duration');

$weeklyData[]=[
'label'=>$day,
'height'=>max(10,$value)
];

}



$habit=[];

foreach($days as $day){

$habit[]=$sessions
->filter(fn($s)=>Carbon::parse($s->created_at)->format('D')==$day)
->count()>0;

}



$moodStats=[

'semangat'=>0,
'biasa'=>0,
'lelah'=>0

];

foreach($sessions as $s){

if($s->mood_id==1) $moodStats['semangat']++;
if($s->mood_id==2) $moodStats['biasa']++;
if($s->mood_id==3) $moodStats['lelah']++;

}



$dominantMood = array_search(max($moodStats),$moodStats);

$recommended = $dominantMood=='lelah' ? 45 : 90;

$insight = $dominantMood=='semangat'
? "Kamu sangat produktif hari ini 🔥"
: ($dominantMood=='biasa'
? "Fokus kamu cukup stabil 👍"
: "Energi kamu agak rendah, istirahat lebih banyak 🌿");



return view('progress.progress',compact(
'studyHours',
'focusLevel',
'breakBalance',
'weeklyData',
'habit',
'insight',
'recommended',
'moodStats',
'dominantMood'
));

}

}