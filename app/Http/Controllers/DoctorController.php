<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\DoctorSpecialization;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::orderBy('name','asc')->paginate(10);
        $specialization = DoctorSpecialization::orderBy('name', 'asc')->paginate(5);
        $data = [
            'role' => session('role'),
            'doctor' => $doctor,
            'specialization' => $specialization
        ];
        return view('pages.doctor')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialization = DoctorSpecialization::pluck('name', 'id');
        return view('pages.ext.add-doctor')->with('specialization', $specialization);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect(route('doctor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $data = [
            'role' => session('role'),
            'doctor' => $doctor
        ];
        return view('pages.ext.edit-dokter')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'min:6'
        ]);

        $pass = Hash::make($request->password);
        $doctor = Doctor::find($id);
        $doctor->name = $request->input('name');
        $doctor->password = $pass;
        $doctor->save();
        return redirect(route('admin-doctor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect (route('admin-doctor'));
    }
}

