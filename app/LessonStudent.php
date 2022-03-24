<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonStudent extends Model
{
    protected $table = 'lesson_student';
    
    protected $fillable = [
        'lesson_id', 'student_id',
    ];

}
