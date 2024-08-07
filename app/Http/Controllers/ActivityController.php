<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {

    }

    public function create(ActivityRequest $request)
    {
        $activity = Activity::create($request->validated());
        return response()->json($activity, 200);
    }

    public function delete(Request $request)
    {
        $activity = Activity::findOrFail($request->id);
        $activity->delete();
        return response(['success' => true, 'status' => 200]);
    }

    public function update(Request $request)
    {
        $activity = Activity::findOrFail($request->id);
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->ready=$request->input('ready');
        $activity->save();
        return response()->json($activity, 200);

    }
}
