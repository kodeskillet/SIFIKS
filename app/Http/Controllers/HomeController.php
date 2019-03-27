<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class HomeController extends Controller
{
    public function index(){
        $article = Articles::OrderBy('created_at','asc')->take(3);
        return view('home')->with('article', $article);
    }
}
