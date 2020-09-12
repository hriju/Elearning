<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table = 'question';
    protected $fillable = [
        'question_title',
        'lesson_id',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer',
        'status'
    ];
    use HasFactory;

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson', 'lesson_id');
    }
}
