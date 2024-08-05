<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStudentRequest;
use App\Models\Group_Student;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    public function index()
    {

    }

    public function create(GroupStudentRequest $request)
    {
        $groupStudent = Group_Student::create($request->validated());
        $groupStudent->save();
        return response()->json(["success" => true, "data" => $groupStudent,"status" => 200]);
    }
}
