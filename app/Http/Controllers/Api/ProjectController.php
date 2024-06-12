<?php

namespace App\Http\Controllers\Api;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        // $projects = Project::all();

        //prende anche i dati delle relazioni e i dati della tabella pivot
        $projects = Project::with('type','technologies')->get();
        return response()->json([
            'projects'=> $projects,
        ]);
    }
}
