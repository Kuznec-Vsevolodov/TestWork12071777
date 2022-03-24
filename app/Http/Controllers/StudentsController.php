<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\LessonStudent;
use App\Lesson;

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function create(Request $request)
    {
        if(Student::where('last_name', $request->input('last_name'))->where('first_name', $request->input('first_name'))->count() == 0){
            Student::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'course' => $request->input('course'),
                'max_credit_limit' => $request->input('max_credit_limit'),
            ]);
            return 'Created';
        }
        return 'Already exists';
    }

    public function delete(Request $request)
    {
        Student::where('id',  $request->input('id'))->delete();

        return 'Deleted';
    }

    public function updateStudent(Request $request, $id){
        $student = Student::where('id', $id)->first();
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->max_credit_limit = $request->input('max_credit_limit');
        $student->course = $request->input('course');
        $student->save();

        return 'Updated';
    }

    public function getAllStudents(){
        return Student::all();
    }

    public function getSpecificStudent($id){
        return view('specific_student', ['student' => Student::where('id', $id)->first()]);
    }

    public function addLessonToStudent(Request $request)
    {
        $lesson_id = $request->input('lesson_id');
        $student_id = $request->input('student_id');

        $current_student = Student::where('id', $student_id)->first();

        if($current_student->isLessonForAdding($lesson_id) == 0){
            $students_lessons_ids = $current_student->lessons()->pluck('lesson_id');

            $sum = Lesson::whereIn('id', $students_lessons_ids)->sum('credit_quantity');
            $sum+=Lesson::where('id', $lesson_id)->sum('credit_quantity');
            
            if($sum <= $current_student->max_credit_limit){
                LessonStudent::create([
                    'lesson_id' => $lesson_id,
                    'student_id' =>  $student_id,
                ]);
                return 'Lesson Added';
            }
            return "Total credit sum is bigger, than student's credits sum";
        }
        return 'This lesson already added';
        
    }

    public function deleteStudentLesson(Request $request)
    {
        $lesson_id = $request->input('lesson_id');
        $student_id = $request->input('student_id');

        $current_student = Student::where('id', $student_id)->first();
        
        if($current_student->isLessonForAdding($lesson_id) > 0){
            LessonStudent::where('lesson_id', $lesson_id)->where('student_id', $student_id)->delete();
            return 'Deleted';
        }
        return 'There is not this lesson for such student';
    }

    public function getStudentLessons($id){
        return Student::where('id', $id)->first()->lessons()->get();
    }
}