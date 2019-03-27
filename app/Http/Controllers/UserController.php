<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article = Articles::OrderBy('created_at','asc')->take(5);
        return view('home')->with('article', $article);
    }
}
