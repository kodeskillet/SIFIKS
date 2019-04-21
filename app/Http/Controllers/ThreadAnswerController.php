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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'answer' => 'required|min:150'
        ]);

        $doctor = $this->currentUser();
        $thread = Thread::find($id);

        $thread->doctor_id = $doctor->id;
        $thread->answer = $request->input('answer');
        $thread->status = true;

        if($thread->save()) {
            return redirect(route('doctor.thread.show', $id))->with('success', 'Jawaban terkirim !');
        }
        return redirect()->back()->with('failed', 'Gagal mengirim jawaban.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $thread = Thread::find($id);
        if(!$thread) {
            abort(404);
        }

        $doctor = $this->currentUser();
        $data = [
            'doctor' => $doctor,
            'thread' => $thread
        ];

        return view('pages.ext.edit-thread')->with('data', $data);
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
            'answer' => 'required|min:150'
        ]);

        $thread = Thread::find($id);
        $thread->answer = $request->input('answer');
        $thread->status = true;

        if($thread->save()) {
            return redirect(route('doctor.thread.show', $id))->with('success', 'Perubahan jawaban terkirim !');
        }
        return redirect()->back()->with('failed', 'Gagal mengirim perubahan jawaban.');
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
            return redirect()->back()->with('success', 'Jawaban dihapus !');
        }
        return redirect()->back()->with('failed', 'Gagal mengahapus jawaban.');
    }

    /**
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('doctor')->user();
    }
}
