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
        $courses = Course::with(['group', 'teacher', 'partial.activity'])->get();

        $coursesWithProgress = $courses->map(function ($course) {
            $totalActivities = 0;
            $completedActivities = 0;

            foreach ($course->partial as $partial) {
                foreach ($partial->activity as $activity) {
                    $totalActivities++;
                    if ($activity->ready) {
                        $completedActivities++;
                    }
                }
            }

            $progress = $totalActivities > 0 ? ($completedActivities / $totalActivities) * 100 : 0;
            $course->progress = $progress;

            return $course;
        });

        return response()->json($coursesWithProgress, 200);
    }

    public function create(CourseRequest $request)
    {
        $course = Course::create($request->validated());
        return response()->json($course, 200);
    }

    public function update(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->name = $request->input('name');
        $course->notes = $request->input('notes');
        $course->id_teacher=$request->input('id_teacher');
        $course->group_id=$request->input('group_id');
        $course->save();
        return response()->json($course, 200);
    }

    public function getPartials($course_id)
    {
        $course = Course::findOrFail($course_id);
        $partials = $course->partial;
        return response()->json($partials, 200);
    }

    public function getProgress($courseId)
    {
        $course = Course::with('partial.activity')->findOrFail($courseId);

        $totalActivities = 0;
        $completedActivities = 0;

        foreach ($course->partial as $partial) {
            foreach ($partial->activity as $activity) {
                $totalActivities++;
                if ($activity->ready) {
                    $completedActivities++;
                }
            }
        }

        $progress = $totalActivities > 0 ? ($completedActivities / $totalActivities) * 100 : 0;

        return response()->json(['progress' => $progress]);
    }

    public function delete(Request $request)
    {
        $group = Course::findOrFail($request->id);
        $group->delete();
        return response(['success' => true, 'status' => 200]);
    }
}
