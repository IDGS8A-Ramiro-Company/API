<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;
class GroupController extends Controller
{
    public function index()
    {

    }

    public function delete(Request $request)
    {
        $group = Group::findOrFail($request->id);
        $group->delete();
        return response(['success' => true, 'status' => 200]);
    }

    public function update(Request $request)
    {
        $group = Group::findOrFail($request->id);
        $group->name=$request->name;
        $group->description = $request->description;
        $group->save();
        return response()->json($group,200);
    }

    public function getCoursesGroup($groupId)
    {
        $group = Group::findOrFail($groupId);
        $courses = $group->courses->map(function ($course) {
            $course->progress = $course->progress;
            return $course;
        });

        return response()->json($courses,200);
    }

    public function create(GroupRequest $request)
    {
        $group = Group::create($request->validated());

        return response()->json($group, 200);
    }

    public function getStudentsGroup($groupId)
    {
        $group = Group::findOrFail($groupId);
        $students = $group->student;
        return response()->json($students,200);
    }

    public function showAll()
    {
        $group = Group::all();

        return response()->json($group, 200);
    }


}
