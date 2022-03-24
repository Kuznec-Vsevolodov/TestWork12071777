<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'StudentsController@index')->name('home');

Route::prefix('students')->group(function () {
    Route::get('/', 'StudentsController@getAllStudents');
    Route::get('/{id}', 'StudentsController@getSpecificStudent');
    Route::get('/get-lessons/{id}', 'StudentsController@getStudentLessons');

    Route::post('create', 'StudentsController@create');
    Route::post('delete', 'StudentsController@delete');
    Route::post('update/{id}', 'StudentsController@updateStudent');
    Route::post('add-lesson-to-student', 'StudentsController@addLessonToStudent');
    Route::post('delete-students-lesson', 'StudentsController@deleteStudentLesson');
});

Route::prefix('lessons')->group(function () {
    Route::get('/', 'LessonsController@index');
    Route::get('get-lessons', 'LessonsController@getLessons');
    Route::get('/{id}', 'LessonsController@getSpecificLesson');

    Route::post('create', 'LessonsController@create');
    Route::post('delete', 'LessonsController@delete');
    Route::post('update/{id}', 'LessonsController@updateLesson');
});
