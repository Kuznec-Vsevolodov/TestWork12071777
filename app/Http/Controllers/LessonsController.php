<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentsLessons;
use App\Lesson;

class LessonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('lessons', ['lessons' => Lesson::all()]);
    }

    public function create(Request $request)
    {
        if(Lesson::where('title', $request->input('title'))->count() == 0){
            Lesson::create([
                'title' => $request->input('title'),
                'desc' => $request->input('desc'),
                'credit_quantity' => $request->input('credit_quantity'),
            ]);
    
            return 'Created';
        }

        return 'Already exists';
    }

    public function delete(Request $request)
    {
        Lesson::where('id',  $request->id)->delete();

        return 'Deleted';
    }

    public function getLessons(){
        return Lesson::all();
    }

    public function updateLesson(Request $request, $id){
        $lesson = Lesson::where('id', $id)->first();
        $lesson->title = $request->input('title');
        $lesson->desc = $request->input('desc');
        $lesson->credit_quantity = $request->input('credit_quantity');
        $lesson->save();

        return 'Updated';
    }

    public function getSpecificLesson($id){
        return view('specific_lesson', ['lesson' => Lesson::where('id', $id)->first()]);
    }
}