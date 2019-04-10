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
     * @throws \Exception
     */
    public function dashboard()
    {
        $since = new Carbon(Auth::guard('doctor')->user()->created_at);
        $data = [
            'role' => session('role'),
            'since' => $since,
        ];
        return view('pages.dashboard')->with('data', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function profile($id)
    {
        $doctor = $this->currentUser();
        if($doctor->id == $id) {
            $data = [
                'doctor' => $doctor
            ];

            return view('pages.profile')->with('data', $data);
        }
        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }

    public function edit($id)
    {
        $doctor = $this->currentUser();
        if($doctor->id == $id) {
            $data = [
                'doctor' => $doctor
            ];

            return view('pages.profile-edit')->with('data', $data);
        }
        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }



    /**
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('doctor')->user();
    }

}
