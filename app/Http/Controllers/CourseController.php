<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        return Course::all();
    }

    public function create(CourseRequest $request)
    {
        $course = Course::create($request->validated());
        return response()->json($course, 200);
    }

    public function update(CourseRequest $request, $course_id)
    {
        $course = Course::findOrFail($request->id);
        $course->update($request->validated());
        $course->save();
        return response()->json($course, 200);
    }

    public function getPartials($course_id)
    {
        $course = Course::findOrFail($course_id);
        $partials = $course->partial;
        return response()->json($partials, 200);
    }

    
}
