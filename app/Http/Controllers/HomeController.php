<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $posts = DB::table('posts')->count();
            return view('home', ['posts' => $posts]);
        }

        return view('auth/login');
    }
}
