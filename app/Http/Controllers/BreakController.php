<?php

namespace App\Http\Controllers;

use App\Models\BreakActivity;

class BreakController extends Controller
{
    public function random()
    {
        $activity = BreakActivity::inRandomOrder()->first();

        return view('break.break-activity', compact('activity'));
    }
}