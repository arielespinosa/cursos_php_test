<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\CourseController;
use App\Http\Controllers\CursoController;



/*
Route::controller(CourseController::class)->group(function(){
    Route::get('cursos/', 'index');
    Route::get('cursos/create/', 'create');
    Route::get('cursos/{course_name}/{version?}/', 'show');

});
*/

Auth::routes();
// Route::resource('/', HomeController::class);
Route::resource('cursos', CursoController::class);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [CursoController::class, 'index'])->name('index');
});
