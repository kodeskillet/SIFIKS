<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Hospital;
use App\City;

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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
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

        if($hospital->save()) {
            return redirect (route('hospital.index'))->with('success', 'Rumah sakit berhasil di tambahkan !');
        }

        return redirect (route('hospital.index'))->with('failed', 'Gagal menambahkan rumah sakit !');
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
        if(!$hospital) {
            abort(401);
        }
        $data = [
            'hospital' => $hospital,
            'rooms' => $this->getRooms($id),
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
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

        if($hospital->save()) {
            return redirect (route('hospital.index'))->with('success', 'Rumah sakit berhasil di perbaharui');
        }

        return redirect (route('hospital.edit', $id))->with('failed', 'Gagal memperbaharui rumah sakit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $rooms = $this->deleteRoomsAndRoomDetail($id);

        if($hospital->delete() && $rooms) {
            return redirect(route('hospital.index'));
        }

    }

    /**
     * @param $hospital_id
     * @return bool
     */
    private function deleteRoomsAndRoomDetail($hospital_id)
    {
        $rooms = $this->getRooms($hospital_id);
        $ids = $rooms->pluck('id')->toArray();

        $delroom = Room::whereIn('id', $ids)->delete();
        $deldetail = DB::table('room_details')
            ->where('hospital_id', '=', $hospital_id)
            ->delete();

        if($delroom && $deldetail) {
            return true;
        }

        return false;
    }

    /**
     * @param $hospital_id
     * @return \Illuminate\Support\Collection
     */
    private function getRooms($hospital_id)
    {
        $rooms = DB::table('rooms')
            ->selectRaw(DB::raw('rooms.*'))
            ->leftJoin('room_details', 'rooms.id', '=', 'room_details.room_id')
            ->where('room_details.hospital_id','=',$hospital_id)
            ->get();

        return $rooms;
    }

    public function indexUser()
    {
        $location = City::orderBy('name','asc')->pluck('name', 'id');
        $data = [
            'location' => $location,
        ];
        return view ('SearchRS')->with('data',$data);
    }

    public function searchHospital(Request $request)
    {
        $hospital = Hospital::where('city_id',$request->location)->orderBy('name')->paginate(5);
        $location = City::orderBy('name','asc')->pluck('name','id');
        $data = [
            'hospital' => $hospital,
            'location' => $location
        ];
        return view ('listHospital')->with('data',$data);
    }

    public function viewHospital($id)
    {
        $hospital = Hospital::find($id);
        $data = [
            'hospital' => $hospital,
            'room' => $this->getRooms($id),
        ];
        return view ('viewhospital')->with('data',$data);
    }
}
