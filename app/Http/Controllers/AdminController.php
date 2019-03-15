<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private static $role = "Admin";

    public function index() {
        return view('pages.dashboard')->with('role', self::$role);
    }

    public function article() {
        return view('pages.article')->with('role', self::$role);
    }

    public function thread() {
        return view('pages.thread')->with('role', self::$role);
    }

    public function admin() {
        return view('pages.admin')->with('role', self::$role);
    }

    public function doctor() {
        return view('pages.doctor')->with('role', self::$role);
    }

    public function member() {
        return view('pages.member')->with('role', self::$role);
    }

    public function hospital() {
        return view('pages.hospital')->with('role', self::$role);
    }
}
