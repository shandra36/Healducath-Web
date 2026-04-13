<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudySession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mood_id',
        'study_duration',
        'break_duration',
        'session_start',
        'session_end'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }
}