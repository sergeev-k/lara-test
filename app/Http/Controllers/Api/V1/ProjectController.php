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
        error_log(json_encode(Project::with('users')));
        $project = Project::findOrFail($id)->where('id', Auth::id());
        return response()->json(['data' => $project], 200);

    }
}
