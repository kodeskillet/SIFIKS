<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocController extends Controller
{
    /**
     * DocController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $since = new Carbon(Auth::guard('doctor')->user()->created_at);

        $data = [
            'role' => session('role'),
            'since' => $since,
        ];
        return view('adm-home')->with('data', $data);
    }

}
