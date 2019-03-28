<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show ($id){
        $user = User::find($id);
        return view('userlayout')->with('user',$user);
    }

    public function edit($id){
        $user = User::find($id);
        return view ('EditUser')->with('user',$user);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->biography = $request->input('biography');
        $user->gender = $request->input('gender');
        $user->save();

        return redirect(route('user',['id'=>$user->id]));

    }

    public function editpassword($id){

    }
}
