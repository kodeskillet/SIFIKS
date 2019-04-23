<?php

namespace App\Http\Controllers;

use App\DoctorSpecialization;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Doctor;
use App\City;
use Psy\Exception\ErrorException;


class DoctorController extends Controller
{
    /**
     * Returning view with data resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        abort(503);
        $doctors = Doctor::orderBy('created_at', 'desc')->paginate(10);
        if(!$doctors) {
            abort(503);
        }

        try {
            return view('pages.doctor', compact('doctors', $doctors));
        } catch (ErrorException $exception) {
            abort(503, $exception);
        }
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'specialty' => 'required',
            'name' => 'required|min:3|max:50',
            'license' => 'required|min:3|max:191',
            'email' => 'required',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'min:6'
        ]);


        $doctor = new Doctor;
        $doctor->name = $request->input('name');
        $doctor->specialization_id = $request->input('specialty');
        $doctor->license = $request->input('license');
        $doctor->email = $request->input('email');
        $doctor->password = Hash::make($request->password);

        if($doctor->save()) {
            return redirect (route('doctor.index'))->with('success', 'Berhasil Menambahkan Dokter !');
        }

        return redirect (route('doctor.index'))->with('failed', 'Gagal menambah dokter !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::where('specialization_id',$id)->orderBy('name','asc')->paginate(5);
        $location = City::orderBy('name','asc')->pluck('name','id');
        $data = [
            'doctor' => $doctor,
            'location' => $location
        ];
        return view('listDoctor')->with('data',$data);
    }

    public function showDoctor($id)
    {
        $doctor = Doctor::find($id);

        return view('viewDoctor')->with('doctor',$doctor);
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
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
        if($doctor->save()) {
            return redirect (route('doctor.index'))->with('success', 'Doktor berhasil di update !');
        }

        return redirect (route('doctor.edit', $id))->with('failed', 'Gagal memperbaharui dokter !');
    }

    public function searchDoctor(Request $request)
    {
        if($request->nama == null AND $request->location != null){
            $doctor = Doctor::where('city_id',$request->location)->orderBy('name','asc')->paginate(5);
        }elseif ($request->location == null AND $request->nama != null){
            $doctor = Doctor::where('name','LIKE','%'.$request->nama.'%')->orderBy('name','asc')->paginate(5);
        }else{
            $doctor = Doctor::where('name','LIKE','%'.$request->nama.'%')->where('city_id',$request->location)->orderBy('name','asc')->paginate(5);
        }
        $location = City::orderBy('name','asc')->pluck('name','id');
        $data = [
            'doctor' => $doctor,
            'location' => $location
        ];

        return view('listDoctor')->with('data',$data);
    }

    public function searchByRadio(Request $request)
    {
        $locationId = City::where('name','LIKE','%'.$request->location.'%')->pluck('id','name');
        $doctor = Doctor::where('city_id',$locationId)->orderBy('name','asc')->paginate(5);
        $location = City::orderBy('name','asc')->pluck('name','id');
        $data = [
            'doctor'=>$doctor,
            'location' => $location
        ];
        return view('listDoctor')->with('data',$data);
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

        return redirect (route('doctor.index'));
    }

}

