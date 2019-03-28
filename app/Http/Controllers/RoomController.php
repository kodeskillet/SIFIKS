<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        return view('pages.ext.add-room');
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
            'description' => 'required|min:300',
        ]);

        $room = new Room;
        $room->name = $request->input('name');
        $room->price_per_night = $request->input('price');
        $room->description = $request->input('description');

        if($room->save()) {
            return redirect(route('hospital.index'));
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
            'description' => 'required|min:300',
        ]);

        $room = Room::find($id);
        $room->name = $request->input('name');
        $room->price_per_night = $request->input('price');
        $room->description = $request->input('description');

        $hospital = Hospital::find($request->hospital_id);
        $hospital->updated_at = Carbon::now();

        if($room->save() && $hospital->save()) {
            return redirect(route('hospital.index'));
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
}
