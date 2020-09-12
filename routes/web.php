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

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/course/{course}', 'App\Http\Controllers\CourseController@show');
Route::get('/course/lesson/{lesson}', 'App\Http\Controllers\LessonController@show');
Route::resource('/manageCourse', 'App\Http\Controllers\CourseController');
/*Route::resource('contacts', 'ContactController');*/
