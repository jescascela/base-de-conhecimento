<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $posts = DB::table('posts')->count();
            $files = Storage::files('manuals');
            return view('home', ['posts' => $posts, 'files' => count($files)]);
        }

        return view('auth/login');
    }
}
