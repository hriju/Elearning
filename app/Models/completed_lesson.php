<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class completed_lesson extends Model
{
    protected $table = 'lesson_completed';
    use HasFactory;
    protected $fillable = [
        'lesson_id',
        'user_id',
        'status'
    ];
}
