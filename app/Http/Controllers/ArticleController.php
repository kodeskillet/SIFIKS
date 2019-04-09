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
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Articles::orderBy('category','asc')->paginate(5);
        $data = [
            'articles' => $articles
        ];

        return view('pages.article')->with('data', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.ext.add-article');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'title' => 'required',
            'content' => 'required|min:500',
        ]);

        $article = new Articles;
        $article->category = $request->input('category');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if(session('guard') == 'admin') {
            $article->admin_id = Auth::guard('admin')->user()->id;
        } else {
            $article->doctor_id = Auth::guard('doctor')->user()->id;
        }

        if($article->save()) {
            return redirect (route('article.index'))->with('success', 'Artikel baru berhasil ditambahkan !');
        }

        return redirect(route('article.create'))->with('failed', 'Gagal menambahkan artikel.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = Articles::find($id);
        return view('pages.ext.view-article')->with('article', $article);
    }

    /**
     * @param $cat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
            'articles' => Articles::where('category', $cat)->orderBy('title','asc')->get(),
            'category' => $category,
            'cat' => $cat
        ];

        return view('articles')->with('data', $data);
    }

    public function listByName($cat, $name)
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
                'articles' => Articles::where('category', $cat)
                                        ->where('title','LIKE',$name.'%')
                                        ->orderBy('title','asc')
                                        ->get(),
                'category' => $category,
                'cat' => $cat
            ];

        return view('articles')->with('data', $data);
    }

    public function search(Request $request, $cat)
    {
        $cari = $request->cari;
        $articles = Articles::where('category', $cat)
                        ->where('content','LIKE','%'.$cari.'%')
                        ->orderBy('title','asc')
                        ->get();
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
            'articles' => $articles,
            'category' => $category,
            'cat' => $cat
        ];
        return view('articles')->with('data', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Articles::find($id);
        $data = [
            'article' => $article
        ];
        return view('pages.ext.edit-article')->with('data', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'title' => 'required',
            'content' => 'required|min:500',
        ]);

        $article = Articles::find($id);
        $article->category = $request->input('category');
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        if($article->save()) {
            return redirect (route('article.index'))->with('success', 'Artikel berhasil diubah !');
        }

        return redirect (route('article.edit', $id))->with('failed', 'Gagal mengubah artikel !');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $article = Articles::find($id);

        if($article->delete()) {
            return redirect()->back()->with('success', 'Artikel dihapus !');
        }

        return redirect()->back()->with('failed', 'Gagal menghapus artikel.');
    }
}
