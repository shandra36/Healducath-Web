<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'deadline',
        'is_completed',
        'status'
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'deadline' => 'date',
    ];
}