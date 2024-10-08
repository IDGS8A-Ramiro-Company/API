<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function getTeachers()
    {
        $students = User::where('id_rol', 2)->get();
        return response()->json($students);
    }
}
