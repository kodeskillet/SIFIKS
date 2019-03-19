<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'role' => 'Admin'
        ];
        return view('pages.dashboard')->with('data', $data);
    }

    public function article() {
        $data = [
            'role' => 'Admin'
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
