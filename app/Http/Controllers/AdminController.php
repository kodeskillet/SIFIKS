<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Articles;
use App\Admin;
use App\Doctor;

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
        $articles = Articles::orderBy('category','desc')->paginate(5);
        $data = [
            'articles' => $articles
        ];
        return view('pages.article')->with('data', $data);
    }
    //==========================CRUD_DOKTER=============CRUD_DOKTER==========================CRUD_DOKTER============================

    public function doctor() {
        $doctor = Doctor::orderBy('name','desc')->paginate(10);
        $data = [
            'role' => session('role'),
            'doctor' => $doctor,
        ];
        return view('pages.doctor')->with('data',$data);
    }

    public function createdoctor(){
        return view('pages.ext.add-doctor');
    }

    public function storedoctor(Request $request){
        $this->validate($request,[
            'specialization_id' => 'required',
            'city_id' => 'required',
            'name' => 'required|min:3|max:50',
            'license' => 'required|min:3|max:191',
            'biography' => 'required',
            'email' => 'required',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'min:6'
        ]);

        $pass = Hash::make($request->password);
        $doctor = new Doctor;
        $doctor->specialization_id = $request->input('specialization_id');
        $doctor->city_id = $request->input('city_id');
        $doctor->name = $request->input('name');
        $doctor->license = $request->input('license');
        $doctor->biography = $request->input('biography');
        $doctor->email = $request->input('email');
        $doctor->password = $pass;
        $doctor->profile_picture = 2;
        $doctor->save();

        return redirect('/admin/doctor');
    }

    public function destroydoctor($id){

        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect (route('admin-doctor'));
    }

    public function editdoctor($id){
        $doctor = Doctor::find($id);
        $data = [
            'role' => session('role'),
            'doctor' => $doctor
        ];
        return view('pages.ext.edit-doctor')->with('data', $data);
    }

    public function updatedoctor(Request $request){

    }

    //==========================CRUD_DOKTER=============CRUD_DOKTER==========================CRUD_DOKTER============================

    //==============================================================================================================================

    //======================================================CRUD_ADMIN==============================================================

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

    //======================================================CRUD_ADMIN============================================

    public function thread() {
        return view('pages.thread');
    }

    public function member() {
        return view('pages.member');
    }

    public function hospital() {
        return view('pages.hospital');
    }
}
