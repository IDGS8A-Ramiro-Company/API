<?php

use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('api/v1')->group(function () {
    Route::get('/groups/{groupId}/students', [GroupController::class, 'getStudentsGroup']);
    Route::post('/groupStudent',[\App\Http\Controllers\GroupStudentController::class,'create']);
    Route::get('/students/{student_id}/groups',[\App\Http\Controllers\StudentController::class,'getGroups']);
    Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::delete('/auth', [\App\Http\Controllers\AuthController::class, 'delete']);
    Route::put('/auth', [\App\Http\Controllers\AuthController::class, 'update']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/groups',[GroupController::class,'create']);
    Route::delete('/groups',[GroupController::class,'delete']);
    Route::get('/groups',[GroupController::class,'showAll']);
    Route::get('/groups/{groupId}',[GroupController::class,'getCoursesGroup']);
    Route::put('/groups',[GroupController::class,'update']);
    Route::post('/partials',[\App\Http\Controllers\PartialController::class,'create']);
    Route::delete('/partials',[\App\Http\Controllers\PartialController::class,'delete']);
    Route::put('/partials',[\App\Http\Controllers\PartialController::class,'update']);
    Route::get('/partials/{partial_id}/activities',[\App\Http\Controllers\PartialController::class,'getActivities']);
    Route::post('/courses',[\App\Http\Controllers\CourseController::class,'create']);
    Route::delete('/courses',[\App\Http\Controllers\CourseController::class,'delete']);
    Route::get('/courses/{id}/partials',[\App\Http\Controllers\CourseController::class,'getPartials']);
    Route::get('/courses',[\App\Http\Controllers\CourseController::class,'show']);
    Route::put('/courses',[\App\Http\Controllers\CourseController::class,'update']);
    Route::post('/activities',[\App\Http\Controllers\ActivityController::class,'create']);
    Route::delete('/activities',[\App\Http\Controllers\ActivityController::class,'delete']);
    Route::get('/students',[\App\Http\Controllers\StudentController::class,'getStudents']);
    Route::put('/students/{id}',[\App\Http\Controllers\StudentController::class,'update']);
    Route::get('/teachers',[\App\Http\Controllers\TeacherController::class,'getTeachers']);
    Route::put('/activities',[\App\Http\Controllers\ActivityController::class,'update']);
    Route::get('/courses/{id}/progress',[\App\Http\Controllers\CourseController::class,'getProgress'])->name('courses.getProgress');
});
