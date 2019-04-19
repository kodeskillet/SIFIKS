<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

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
}
