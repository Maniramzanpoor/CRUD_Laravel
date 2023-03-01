<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $projects = Projects::all();
        return inertia::render('Projects/Index', ['projectslist' => $projects]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function ShowCreatePage(): Response
    {
        return inertia('Projects/Index');
    }
    public function create(Request $request)
    {
        Projects::create(['message' => $request->description]);
        return Redirect::to('/Projects');
    }
    /*
    *Delete The Field In DB
    */
    public function destroy($id)
    {
        $query = Projects::find($id);
        $query->delete();
        return Redirect::to('/Projects');
    }
}
