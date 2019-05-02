<?php

namespace App\Http\Controllers;

use App\Common;
use App\Thread;
use App\ThreadTopic;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $query
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($query)
    {
        $threads = null;
        $count = null;
        if($query == "all") {
            $threads = Thread::orderBy('created_at', 'desc')->paginate(15);
        } elseif($query == "answered") {
            $threads = Thread::where('status', true)
                            ->orderBy('created_at', 'desc')
                            ->paginate(15);
        } else {
            $threads = Thread::where('status', false)
                            ->orderBy('created_at', 'desc')
                            ->paginate(15);
        }

        $data = [
            'threads' => $threads,
            'query' => $query,
            'count' => [
                'all' => count(Thread::all()),
                'answered' => count(Thread::where('status', true)->get()),
                'unanswered' => count(Thread::where('status', false)->get())
            ]
        ];

        return view('pages.thread')->with('data', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::find($id);
        if(!$thread) {
            abort(404);
        }

        $doctor = Auth::guard('doctor')->user();
        $data = [
            'thread' => $thread,
            'doctor' => $doctor
        ];
        return view('pages.ext.view-thread')->with('data', $data);
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
        $unreg = null;
        if($thread->delete() && $this->deleteTopic($thread->id_topic)) {
            $unreg = Common::unregisterLog([
                'target' => 'thread',
                'target_id' => $id
            ]);
        }
        if($unreg != null && $unreg) {
            return redirect(route('admin.thread.index', ['query' => "all"]))->with('success', 'Diskusi dihapus !');
        }
        return redirect()->back()->with('failed', 'Gagal menghapus diskusi.');
    }


    /**
     * Delete topic with given id
     *
     * @param $id
     * @return bool
     */
    public function deleteTopic($id)
    {
        $topic = ThreadTopic::find($id);
        if($topic->delete()) {
            return true;
        }
        return false;
    }
}
