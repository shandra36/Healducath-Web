<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BreakActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'description',
        'duration_seconds'
    ];
}