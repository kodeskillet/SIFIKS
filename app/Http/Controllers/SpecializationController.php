<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoctorSpecialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialization = DoctorSpecialization::orderBy('name', 'asc')->paginate(5);
        $data = [
            'specialization' => $specialization
        ];

        return view('pages.specialization')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ext.add-specialization');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'degree' => 'required',
            'name' => 'required',
            'detail' => 'required|min:300'
        ]);

        $specialty = new DoctorSpecialization;
        $specialty->degree = $request->input('degree');
        $specialty->name = $request->input('name');
        $specialty->detail = $request->input('detail');

        if($specialty->save()) {
            return redirect(route('doctor.index'));
        }
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
        $specialty = DoctorSpecialization::find($id);
        return view('pages.ext.edit-specialization')->with('specialty', $specialty);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialty = DoctorSpecialization::find($id);
        if($specialty->delete()) {
            return redirect(route('doctor.index'));
        }
    }
}
