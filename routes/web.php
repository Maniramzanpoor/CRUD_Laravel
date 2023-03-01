<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProjectsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/* post routes */
Route::get('posts', [PostsController::class, 'Index']);
Route::get('/addposts', [PostsController::class, 'showAddPosts']);
Route::post('/addposts', [PostsController::class, 'create']);
/* Projects routes */
Route::get('/Projects', [ProjectsController::class, 'Index'])->name('Projects.Index');
Route::post('/Projects', [ProjectsController::class, 'create'])->name('Projects.Create');
Route::delete("/Projects/{id}", [ProjectsController::class, 'destroy'])->name('Projects.destroy');
/* File Manager route */
Route::get('Files', [FilesController::class, 'index'])->name('Files.Index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('chirps', ChirpController::class)->only(['index', 'store'])->middleware(['auth', 'verified']);
require __DIR__ . '/auth.php';
