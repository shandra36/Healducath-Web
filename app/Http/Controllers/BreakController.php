<?php

namespace App\Http\Controllers;

use App\Models\BreakActivity;

class BreakActivityController extends Controller
{
    public function random()
    {
        $activity = BreakActivity::inRandomOrder()->first();

        return response()->json($activity);
    }
}