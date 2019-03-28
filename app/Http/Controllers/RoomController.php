<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Hospital;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hospital_id)
    {
        $data = [
            'hospital' => Hospital::find($hospital_id)
        ];
        return view('pages.ext.add-room')->with('data', $data);
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
            'name' => 'required',
            'price' => 'required|numeric|min:6',
            'description' => 'required|min:150',
        ]);

        $hospital_id = $request->input('hospital_id');
        $room_id = DB::table('rooms')
            ->insertGetId(array(
                'name' => $request->input('name'),
                'price_per_night' => $request->input('price'),
                'description' => $request->input('description'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));

        if($room_id != null && $hospital_id != null) {
            $data = [
                'hospital_id' => $hospital_id,
                'room_id' => $room_id
            ];

            if($this->updateRoomDetails($data)) {
                return redirect(route('hospital.show', $hospital_id));
            }
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
     * @param   int $id
     * @param   int $hospital_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $hospital_id)
    {
        $data = [
            'room' => Room::find($id),
            'hospital' => Hospital::find($hospital_id)
        ];
        return view('pages.ext.edit-room')->with('data', $data);
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
            'name' => 'required',
            'price' => 'required|numeric|min:6',
            'description' => 'required|min:150',
        ]);

        $room = Room::find($id);
        $room->name = $request->input('name');
        $room->price_per_night = $request->input('price');
        $room->description = $request->input('description');

        $hospital = $this->updateHospitalUpdatedAt($request->input('hospital_id'));

        if($room->save() && $hospital == true) {
            return redirect(route('hospital.show', $request->input('hospital_id')));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $hospital_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $hospital_id)
    {
        $room = Room::find($id);

        $hospital = Hospital::find($hospital_id);
        $hospital->updated_at = Carbon::now();

        if($room->save() && $hospital->save()) {
            return redirect(route('hospital.show', ['id' => $hospital_id]));
        }
    }

    private function updateRoomDetails($data) {
        $insert = DB::table('room_details')
            ->insert([
                'room_id' => $data['room_id'],
                'hospital_id' => $data['hospital_id']
            ]);

        if($insert) {
            return true;
        }

        return false;
    }

    private function updateHospitalUpdatedAt($id) {
        $hospital = Hospital::find($id);
        $hospital->updated_at = Carbon::now();
        if($hospital->save()) {
            return true;
        }

        return false;
    }
}
