<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function dashboard()
    {
        $since = new Carbon(Auth::user()->created_at);

        $data = [
            'role' => session('role'),
            'since' => $since,
        ];
        return view('adm-home')->with('data', $data);
    }


    /**
     * START OF ADMIN CRUD
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admin = Admin::all();
        $data = [
            'role' => session('role'),
            'admin' => $admin,
        ];
        return view('pages.admin')->with('data',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $data = [
            'role' => session('role')
        ];
        return view ('pages.ext.add-admin')->with('data',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'email' => 'required',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'min:6'
        ]);

        $pass = Hash::make($request->password);

        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = $pass;
        $admin->save();

        return redirect ('/admin/admin');
    }


    public function profile($id)
    {
        $admin = $this->currentUser();
        if ($admin->id == $id) {
            $data = [
                'admin' => $admin
            ];
            return view('pages.profile')->with('data', $data);
        }

        return redirect()->back();
    }



    public function editProfile($id)
    {
        $admin = $this->currentUser();
        if ($admin->id == $id) {
            $data = [
                'admin' => $admin
            ];
            return view('pages.profile-edit')->with('data', $data);
        }

        return redirect()->back();
    }


    public function updateProfile(Request $request, $id)
    {
        $admin = $this->currentUser();
        if ($admin->id == $id) {
            return true;
        }
    }


    /**
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('admin')->user();
    }


}
