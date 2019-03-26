<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    public function index() {
        return view('adm-home');
    }

    public function article() {
        $articles = Articles::all();
        $data = [
            'articles' => $articles
        ];
        return view('pages.article')->with('data', $data);
    }

    public function thread() {
        return view('pages.thread');
    }

    //==============================================CRUD_DOCTOR=============================================



    //==============================================CRUD_DOCTOR=============================================
}
