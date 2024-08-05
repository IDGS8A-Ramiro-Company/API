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
}
