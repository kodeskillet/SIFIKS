<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class AdminController extends Controller
{
    public function index() {
        return view('pages.dashboard');
    }

    public function article() {
        $articles = Articles::all();
        $data = [
            'articles' => $articles
        ];
        return view('pages.article')->with('data', $data);
    }

    public function thread() {
        return view('pages.thread');
    }

    public function admin() {
        return view('pages.admin');
    }

    public function doctor() {
        return view('pages.doctor');
    }

    public function member() {
        return view('pages.member');
    }

    public function hospital() {
        return view('pages.hospital');
    }
}
