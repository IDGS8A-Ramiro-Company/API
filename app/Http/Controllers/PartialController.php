<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartialRequest;
use App\Models\Partial;
use Illuminate\Http\Request;

class PartialController extends Controller
{
    public function index()
    {

    }

    public function create(PartialRequest $request)
    {
        $partial = Partial::create($request->validated());
        return response()->json($partial, 200);
    }

    public function getActivities($partial_id)
    {
        $partial=Partial::findOrFail($partial_id);
        $activities=$partial->activity;
        return response()->json($activities, 200);
    }

    public function update(PartialRequest $request, $partiid)
    {
        $partial = Partial::findOrFail($partiid);
        $partial->update($request->validated());
        $partial->save();
        return response()->json($partial, 200);
    }
}
