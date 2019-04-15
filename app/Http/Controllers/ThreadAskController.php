<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Thread;
use App\ThreadTopic;

class ThreadAskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('created_at', 'asc')->get();
        return view('ask-index')->with('threads', $threads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $threads = Thread::orderBy('created_at', 'asc')->get();
        return view('ask-form')->with('threads', $threads);;
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
            'topic' => 'required|min:10',
            'question' => 'required|min:100'
        ]);

        $topic = $this->addTopic($request->input('topic'));

        if($topic != null) {
            $thread = new Thread;
            $thread->user_id = $this->currentUser()->id;
            $thread->id_topic = $topic->id;
            $thread->question = $request->input('question');

            if($thread->save()) {
                return redirect(route('user.thread.index'))->with('success', 'Pertanyaan dikirim !');
            }
            return redirect()->back()->with('failed', 'Gagal mengirim pertanyaan, silahkan coba lagi nanti.');
        }
        return redirect()->back()->with('failed', 'Gagal mengirim pertanyaan, silahkan coba lagi nanti.');
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
        //
    }


    private function currentUser() {
        return Auth::guard('web')->user();
    }

    /**
     * @param string $topic
     * @return ThreadTopic|null
     */
    private function addTopic(string $topic) {
        $new = new ThreadTopic;
        $new->topic_name = $topic;
        if($new->save()) {
            return $new;
        }
        return null;
    }
}
