<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\User;

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


    public function show($id){
        $article = Articles::find($id);
        return view('viewarticle')->with('article',$article);
    }

    public function index()
    {
        $article = Articles::orderBy('created_at','desc')->take(3)->get();
        return view('home')->with('article', $article);
    }
}
