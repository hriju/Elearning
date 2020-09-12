<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    protected $fillable = [
        'lesson_title',
        'lesson_desc',
        'course_id',
        'status'
    ];
    use HasFactory;
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
}
