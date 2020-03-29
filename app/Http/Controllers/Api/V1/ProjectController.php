<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return response()->json(['data' => $projects], 200);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json(['data' => $project], 200);

    }
}
