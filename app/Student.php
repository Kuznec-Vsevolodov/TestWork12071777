<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'course', 'max_credit_limit',
    ];


    public function lessons(){
        return $this->belongsToMany('App\Lesson');
    }

    public function isLessonForAdding($lesson_id){
        return $this->belongsToMany('App\Lesson')
                    ->where('lesson_id', $lesson_id)->count();
    }
}
