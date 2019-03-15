<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private static $role = "Doctor";

    public function index() {
        return view('pages.dashboard')->with('role', self::$role);
    }

    public function article() {
        return view('pages.article')->with('role', self::$role);
    }

    public function thread() {
        return view('pages.thread')->with('role', self::$role);
    }
}
