<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index() {
        $data = [
            'role' => 'Doctor'
        ];
        return view('pages.dashboard')->with('data', $data);
    }

    public function article() {
        $data = [
            'role' => 'Doctor'
        ];
        return view('pages.article')->with('data', $data);
    }

    public function thread() {
        $data = [
            'role' => 'Doctor'
        ];
        return view('pages.thread')->with('data', $data);
    }
}
