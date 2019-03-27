<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class HomeController extends Controller
{
    public function index(){
        $article = Articles::orderBy('title','asc')->take(3)->get();
        return view('home')->with('article', $article);
    }
}
