<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mood extends Model
{
    use HasFactory;

    protected $fillable = [
        'mood_name',
        'description'
    ];

    public function moodLogs()
    {
        return $this->hasMany(MoodLog::class);
    }

    public function studySessions()
    {
        return $this->hasMany(StudySession::class);
    }
}