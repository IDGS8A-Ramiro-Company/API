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

    public function create(GroupRequest $request)
    {
        $group = Group::create($request->validated());

        return response()->json($group, 200);
    }

    public function update(GroupRequest $request, Group $group)
    {

    }

    public function showAll()
    {
        $group = Group::all();

        return response()->json($group, 200);
    }


}
