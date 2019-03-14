<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $role = "Admin";
        return view('test')->with('role', $role);
    }
}
