<?php

namespace App\Http\Controllers\Api;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){

        // $projects = Project::all();
        $pages = $request->pages ?? 3;
        //prende anche i dati delle relazioni e i dati della tabella pivot
        $projects = Project::with('type','technologies')->paginate($pages);

        return response()->json([
            'projects'=> $projects,
        ]);
    }
}
