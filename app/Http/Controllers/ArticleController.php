<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Articles;
use App\Admin;
use App\Doctor;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Articles::orderBy('category','asc')->paginate(5);
//        $writer = array();
//
//        foreach ($articles as $article) {
//            if($article->writer == 'Admin') {
//                array_push($writer, Admin::where('id', $article->writer_id)->name);
//            } else {
//
//            }
//        }

        $data = [
            'articles' => $articles
        ];

        return view('pages.article')->with('data',$data);
    }


    public function create()
    {
        return view('pages.ext.add-article');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = new Articles;
        $article->category = $request->input('category');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->writer = session('role');
        $article->writer_id = Auth::guard(session('guard'))->user()->id;
//        $article->cover_image = "fauzan";
        $article->save();

        return redirect ('/admin/article');
    }


    public function show($id)
    {
        $article = Articles::find($id);
//        $writer = null;

/*        if($article->writer == "Admin") {
            $writer = $article->admin()->name;
        }*/

        return view('pages.ext.view-article')->with('article', $article);
    }


    public function listByCat($cat)
    {
        $category = null;

        switch ($cat) {
            case "penyakit":
                $category = "Penyakit";
                break;
            case "obat":
                $category = "Obat - obatan";
                break;
            case "hidup-sehat":
                $category = "Hidup Sehat";
                break;
            case "keluarga":
                $category = "Keluarga";
                break;
            case "kesehatan":
                $category = "Kesehatan";
                break;
        }

        $data = [
            'articles' => Articles::where('category', $cat),
            'category' => $category,
            'cat' => $cat
        ];

        return view('articles')->with('data', $data);
    }


    public function edit($id)
    {
        $article = Articles::find($id);
        $data = [
            'article' => $article
        ];
        return view('pages.ext.edit-article')->with('data', $data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Articles::find($id);
        $article->category = $request->input('category');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        // $article->writer_id = 1;
        $article->cover_image = "fauzan";
        $article->save();

        return redirect (route('article.index'));
    }


    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();

        return redirect (route('article.index'));
    }
}
