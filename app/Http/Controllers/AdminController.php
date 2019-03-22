<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Articles;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $since = new Carbon(Auth::user()->created_at);

        $data = [
            'role' => session('role'),
            'since' => $since
        ];
        return view('adm-home')->with('data', $data);
    }

//    public function index() {
//        return view('pages.dashboard');
//    }


    public function article() {
        $articles = Articles::all();
        $data = [
            'articles' => $articles
        ];
        return view('pages.article')->with('data', $data);
    }

    //======================================================CRUD============================================

    public function admin() {
        $admin = Admin::all();
        $data = [
            'role' => session('role'),
            'admin' => $admin,
        ];
        return view('pages.admin')->with('data',$data);
    }

    public function store(Request $request){
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

    public function create(){

        $data = [
            'role' => session('role')
        ];
        return view ('pages.ext.add-admin')->with('data',$data);
    }

    //======================================================CRUD============================================

    public function thread() {
        return view('pages.thread');
    }

    public function doctor() {
        return view('pages.doctor');
    }

    public function member() {
        return view('pages.member');
    }

    public function hospital() {
        return view('pages.hospital');
    }
}
