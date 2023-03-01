<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Files;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class FilesController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $allFiles = Storage::disk('base')->allFiles();
        $files = array();

        foreach ($allFiles as $file) {
            $files[] = $this->fileInfo(pathinfo(public_path() . '/uploads/' . $file));
        }
        return inertia("Files/Index", ['Files' => $files]);
    }
    public function fileInfo($filePath)
    {
        $file = array();
        $file['name'] = $filePath['filename'];
        $file['extension'] = $filePath['extension'];
        $file['size'] = filesize($filePath['dirname'] . '/' . $filePath['basename']);

        return $file;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Files $files): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Files $files): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Files $files): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Files $files): RedirectResponse
    {
        //
    }
}
