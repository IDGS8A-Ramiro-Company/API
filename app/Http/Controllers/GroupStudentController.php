<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStudentRequest;
use App\Models\Group_Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupStudentController extends Controller
{
    public function index()
    {

    }

    public function create(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'student_id' => 'required|exists:users,id',
        ]);

        $idGroup = $request->input('group_id');
        $idStudent = $request->input('student_id');

        $existingRecord = DB::table('group_students')->where('student_id', $idStudent)->first();

        if ($existingRecord) {
            DB::table('group_students')
                ->where('student_id', $idStudent)
                ->update(['group_id' => $idGroup]);
        } else {
            // Si no existe, insertar un nuevo registro
            DB::table('group_students')->insert([
                'group_id' => $idGroup,
                'student_id' => $idStudent,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['message' => 'Operation successful'], 200);
        //$groupStudent = Group_Student::create($request->validated());
        //$groupStudent->save();
       // return response()->json(["success" => true, "data" => $groupStudent,"status" => 200]);
    }
}
