<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Inertia\RedirectResponse;

class PostsController extends Controller
{
    public function Index(): Response
    {
        $posts = posts::all();
        return Inertia('Posts/Index', ['posts' => $posts]);
    }
    public function showAddPosts()
    {
        return inertia('Posts/AddPost');
    }
    public function create(Request $request)
    {
        posts::create([
            'title' => $request->title,
            'description' => $request->description,
            'creationby' => $request->creationby,
        ]);

        return Inertia::render('Welcome');
    }
}
