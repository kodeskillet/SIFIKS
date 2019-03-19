<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.dashboard')->with('data', $data);
    }

    public function article() {
        $articles = Articles::all();
        $data = [
            'role' => 'Admin',
            'articles' => $articles
        ];
        return view('pages.article')->with('data', $data);
    }

    public function thread() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.thread')->with('data', $data);
    }

    public function admin() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.admin')->with('data', $data);
    }

    public function doctor() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.doctor')->with('data', $data);
    }

    public function member() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.member')->with('data', $data);
    }

    public function hospital() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.hospital')->with('data', $data);
    }
}
