<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\City;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospital = Hospital::orderBy('city_id','asc')->paginate(10);
        $data = [
            'role' => session('role'),
            'hospital' => $hospital
        ];
        return view('pages.hospital')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city_id = City::pluck('name', 'id');
        return view('pages.ext.add-hospital')->with('city_id', $city_id);
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
            'name'=>'required|min:3',
            'city_id'=>'required',
            'biography'=>'required',
            'address'=>'required|min:3',
            'medical_services'=>'required',
            'public_services'=>'required',
        ]);

        $hospital = new Hospital;
        $hospital->name = $request->input('name');
        $hospital->city_id = $request->input('city_id');
        $hospital->biography = $request->input('biography');
        $hospital->address = $request->input('address');
        $hospital->medical_services = $request->input('medical_services');
        $hospital->public_services = $request->input('public_services');
        $hospital->cover_images_id = 1;
        $hospital->save();

        return redirect(route('hospital.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        $rooms = DB::table('rooms')
            ->selectRaw(DB::raw('rooms.*'))
            ->leftJoin('room_details', 'rooms.id', '=', 'room_details.room_id')
            ->where('room_details.hospital_id','=',$id)
            ->get();

        $data = [
            'hospital' => $hospital,
            'rooms' => $rooms,
        ];

        return view('pages.ext.view-hospital')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::find($id);
        $city_id = City::pluck('name', 'id');
        $data = [
            'role' => session('role'),
            'hospital' => $hospital,
            'city_id' => $city_id
        ];
        return view('pages.ext.edit-hospital')->with('data', $data);
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
        $this->validate($request, [
            'name'=>'required|min:3',
            'city_id'=>'required',
            'biography'=>'required',
            'address'=>'required|min:3',
            'medical_services'=>'required',
            'public_services'=>'required',
        ]);

        $hospital = Hospital::find($id);
        $hospital->name = $request->input('name');
        $hospital->city_id = $request->input('city_id');
        $hospital->biography = $request->input('biography');
        $hospital->address = $request->input('address');
        $hospital->medical_services = $request->input('medical_services');
        $hospital->public_services = $request->input('public_services');
        $hospital->cover_images_id = 1;
        $hospital->save();

        return redirect (route('hospital.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
