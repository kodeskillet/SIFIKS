<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $doctor = $this->currentUser();
        if($doctor->id != $id) {
            return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
        }

        $data = [
            'doctor' => $doctor
        ];
        return view('pages.profile-thread')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        //
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
        $thread = Thread::find($id);
        if($thread->doctor_id != $this->currentUser()->id) {
            return redirect()->back()->with('warning', 'Anda tidak berhak menghapus jawaban untuk diskusi tersebut.');
        }

        $thread->doctor_id = null;
        $thread->answer = null;
        $thread->status = false;
        if($thread->save()) {
            return redirect(route('doctor.thread.index', ['query' => "all"]))->with('success', 'Jawaban dihapus !');
        }
        return redirect()->back()->with('failed', 'Gagal mengahapus jawaban.');
    }

    /**
     * @return mixed
     */
    public function currentUser() {
        return Auth::guard('doctor')->user();
    }
}
