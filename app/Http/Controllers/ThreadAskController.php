<?php

namespace App\Http\Controllers;

use App\Common;
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
        $threads = Thread::orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'threads' => $threads
        ];
        return view('ask-index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $threads = Thread::orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'threads' => $threads
        ];
        return view('ask-form')->with('data', $data);
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

            $log = null;
            if($thread->save()) {
                $log = Common::registerLog([
                    'action' => "membuat diskusi baru.",
                    'target' => 'thread',
                    'prefix' => 't-create',
                    'target_id' => $thread->id,
                    'actor' => 'user',
                    'actor_id' => Common::currentUser('web')->id
                ]);
            }

            if($log != null && $log == true) {
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
        $thread = Thread::find($id);
        if(!$thread) {
            abort(404);
        }

        $threads = Thread::orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'thread' => $thread,
            'threads' => $threads
        ];
        return view('ask-view')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->currentUser();
        $thread = Thread::find($id);
        if($thread->user_id != $user->id) {
            return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
        }

        if($thread->doctor_id != null) {
            return redirect()->back()->with('warning', 'Tidak dapat mengubah pertanyaan karena sudah terjawab, silahkan tanyakan pertanyaan baru.');
        }
        $threads = Thread::orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'thread' => $thread,
            'threads' => $threads
        ];

        return view('ask-edit')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = $this->currentUser();
        $thread = Thread::find($id);
        if($thread->user_id != $user->id) {
            return redirect()->back()->with('warning', 'Anda tidak berhak mengubah ulasan tersebut.');
        }

        $this->validate($request, [
            'topic' => 'required|min:10',
            'question' => 'required|min:100'
        ]);

        $thread->topic = $request->input('topic');
        $thread->question = $request->input('question');
        if($thread->save()) {
            return redirect(route('user.thread.show', $thread->id))->with('success', 'Berhasil mengubah ulasan !');
        }
        return redirect(route('user.thread.show', $thread->id))->with('success', 'Berhasil mengubah ulasan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->currentUser();
        $thread = Thread::find($id);
        if($thread->user_id != $user->id) {
            return redirect()->back()->with('warning', 'Anda tidak berhak menghapus ulasan tersebut.');
        }

        $unreg = null;
        if($thread->delete() && $this->deleteTopic($thread->id_topic)) {
            $unreg = Common::unregisterLog([
               'target' => 'thread',
               'target_id' => $id
            ]);
        }
        if($unreg != null && $unreg) {
            return redirect(route('user.profile'))->with('success', 'Ulasan dihapus !');
        }
        return redirect()->back()->with('failed', 'Gagal menghapus ulasan.');
    }

    /**
     * Get currently logged in user
     *
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('web')->user();
    }

    /**
     * @param string $topic
     * @return ThreadTopic|null
     */
    private function addTopic(string $topic)
    {
        $new = new ThreadTopic;
        $new->topic_name = $topic;
        if($new->save()) {
            return $new;
        }
        return null;
    }

    /**
     * Delete topic with given id
     *
     * @param int $id
     * @return bool
     */
    private function deleteTopic($id)
    {
        $topic = ThreadTopic::find($id);
        if($topic->delete()) {
            return true;
        }
        return false;
    }
}
