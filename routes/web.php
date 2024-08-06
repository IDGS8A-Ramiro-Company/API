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
    Route::get('/groups/{groupId}/students', [GroupController::class, 'getStudentsGroup']);
    Route::post('/groupStudent',[\App\Http\Controllers\GroupStudentController::class,'create']);
    Route::get('/students/{student_id}/groups',[\App\Http\Controllers\StudentController::class,'getGroups']);
    Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::delete('/auth', [\App\Http\Controllers\AuthController::class, 'delete']);
    Route::put('/auth', [\App\Http\Controllers\AuthController::class, 'update']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/groups',[GroupController::class,'create'])->name('group.create');
    Route::delete('/groups',[GroupController::class,'delete'])->name('group.delete');
    Route::get('/groups',[GroupController::class,'showAll'])->name('group.showAll');
    Route::get('/groups/{groupId}',[GroupController::class,'getCoursesGroup'])->name('group.getCoursesGroup');
    Route::put('/groups',[GroupController::class,'update'])->name('group.update');
    Route::post('/partials',[\App\Http\Controllers\PartialController::class,'create'])->name('partial.create');
    Route::put('/partials/{partiId}',[\App\Http\Controllers\PartialController::class,'update'])->name('partial.update');
    Route::get('/partials/{partial_id}/activities',[\App\Http\Controllers\PartialController::class,'getActivities']);
    Route::post('/courses',[\App\Http\Controllers\CourseController::class,'create'])->name('course.create');
    Route::get('/courses',[\App\Http\Controllers\CourseController::class,'show'])->name('course.show');
    Route::put('/courses/{id}',[\App\Http\Controllers\CourseController::class,'update'])->name('course.update');
    Route::post('/activities',[\App\Http\Controllers\ActivityController::class,'create'])->name('activity.create');
    Route::get('/students',[\App\Http\Controllers\StudentController::class,'getStudents'])->name('students.getStudents');
    Route::put('/students/{studentId}',[\App\Http\Controllers\StudentController::class,'update'])->name('students.update');
    Route::get('/teachers',[\App\Http\Controllers\TeacherController::class,'getTeachers'])->name('students.getTeachers');
});
