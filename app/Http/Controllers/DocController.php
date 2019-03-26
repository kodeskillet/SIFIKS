<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    public function index()
    {
        $since = new Carbon(Auth::user()->created_at);

        $data = [
            'role' => session('role'),
            'since' => $since
        ];
        return view('adm-home')->with('data', $data);
    }

}
