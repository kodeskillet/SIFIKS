<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Articles::all();
        $data = [
            'role' => session('role'),
            'articles' => $articles
        ];

        return view('pages.article')->with('data',$data);
    }


    public function create()
    {
        $data = [
            'role' => session('role')
        ];
        return view('pages.ext.add-article')->with('data', $data);
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
        $article->writer_id = 2;
        $article->cover_image = "fauzan";
        $article->save();

        return redirect ('/admin/article');
    }


    public function show($id)
    {
        $data = [
            'role' => session('role'),
            'article' => Articles::find($id)
        ];

        return view('pages.ext.view-article')->with('data', $data);
    }


    public function listByCat($cat)
    {
        $data = [
            'role' => session('role'),
            'articles' => Articles::where('category', $cat),
            'category' => $cat
        ];

        return view('articles')->with('data', $data);
    }


    public function edit($id)
    {
        $article = Articles::find($id);
        $data = [
            'role' => session('role'),
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
        $article->writer_id = 2;
        $article->cover_image = "fauzan";
        $article->save();

        return redirect (route('admin-article'));
    }


    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();

        return redirect (route('admin-article'));
    }
}
