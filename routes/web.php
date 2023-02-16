<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StorageController;

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

// Route::get('/files', [StorageController::class, 'index']);

// Route::get('/file', function(){
//     return view('file');
// });

// Route::get('/download', [StorageController::class, 'downloadFile']);

// Route::post('/file', [StorageController::class, 'store']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registro', [RegistrationController::class, 'create']);
Route::post('/registro', [RegistrationController::class, 'store']);

Route::middleware('auth')->group(function(){

    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::match(['get', 'post'], '/posts/{post}', [PostController::class, 'show']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    
    Route::get('/tutorials', [TutorialController::class, 'index']);

    Route::get('/projects', [ProjectController::class, 'index']);

    Route::get('/manuals', [StorageController::class, 'index']);
    Route::get('/manuals/create', [StorageController::class, 'create']);
    Route::post('/manuals', [StorageController::class, 'store']);
    Route::delete('manuals/{manual}', [StorageController::class, 'destroy']);
    Route::get('/download/{manual}', [StorageController::class, 'downloadFile']);
});
