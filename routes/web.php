<?php

use App\Http\Controllers\GroupController;
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

Route::prefix('api/v1')->group(function () {
    Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::delete('/auth', [\App\Http\Controllers\AuthController::class, 'delete']);
    Route::put('/auth', [\App\Http\Controllers\AuthController::class, 'update']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/groups',[GroupController::class,'create'])->name('group.create');
    Route::post('/groupStudent',[\App\Http\Controllers\GroupStudentController::class,'create']);
    Route::delete('/groups',[GroupController::class,'delete'])->name('group.delete');
    Route::get('/groups',[GroupController::class,'showAll'])->name('group.showAll');
    Route::get('/groups/{groupId}',[GroupController::class,'getCoursesGroup'])->name('group.getCoursesGroup');
    Route::put('/groups',[GroupController::class,'update'])->name('group.update');
    Route::post('/partials',[\App\Http\Controllers\PartialController::class,'create'])->name('partial.create');
    Route::post('/courses',[\App\Http\Controllers\CourseController::class,'create'])->name('course.create');
    Route::post('/activities',[\App\Http\Controllers\ActivityController::class,'create'])->name('activity.create');
    Route::get('/students',[\App\Http\Controllers\StudentController::class,'getStudents'])->name('students.getStudents');
});
