<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudents()
    {
        $students = User::all()->where('id_rol', 3);
        return response()->json($students,200);
    }
}
