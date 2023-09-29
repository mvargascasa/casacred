<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function index(){

        $response = Http::withoutVerifying()
        ->withHeaders(['api-token-authorization' => env('API_TOKEN_VALIDATE'), 'Cache-Control' => 'no-cache'])
        ->get('https://casapromotora.com/api/projects');

        $projects = $response->json();

        return view('admin.api-projects.index', compact('projects'));

    }

    public function projectById($id){

        $response = Http::withoutVerifying()
        ->withHeaders(['api-token-authorization' => env('API_TOKEN_VALIDATE'), 'Cache-Control' => 'no-cache'])
        ->get('https://casapromotora.com/api/project/'.$id);

        $project = $response->json();
                
        return view('admin.api-projects.show', compact('project'));
    }

}
