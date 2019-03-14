<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index() {
        $role = "Doctor";
        return view('test')->with('role', $role);
    }
}
