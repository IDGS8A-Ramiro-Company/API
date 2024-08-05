<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudents()
    {
        $students = User::where('id_rol', 3)->get();
        return response()->json($students);
    }

    public function getGroups($student_id)
    {
        $student = User::findOrFail($student_id);
        $groups = $student->group;
        return response()->json($groups,200);
    }
}
