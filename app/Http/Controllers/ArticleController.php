<?php

namespace App\Http\Controllers;

use App\Common;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Articles;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at','desc')->paginate(15);
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
            'cover_image' => 'image|nullable|max:3999'
        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $article = new Articles;
        $article->category = $request->input('category');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if(session('guard') == 'admin') {
            $article->admin_id = Auth::guard('admin')->user()->id;
        } else {
            $article->doctor_id = Auth::guard('doctor')->user()->id;
        }
        $article->cover_image = $fileNameToStore;

        $log = null;
        if($article->save()) {
            $log = Common::registerLog([
                'action' => "membuat artikel baru.",
                'target' => 'article',
                'prefix' => 'a-create',
                'target_id' => $article->id,
                'actor' => session('guard'),
                'actor_id' => Common::currentUser(session('guard'))->id
            ]);
        }

        if($log != null && $log == true) {
            return redirect (route(session('guard').'.article.index'))->with('success', 'Artikel baru berhasil ditambahkan !');
        }

        return redirect(route(session('guard').'.article.create'))->with('failed', 'Gagal menambahkan artikel.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = Articles::find($id);
        if(!$article) {
            abort(404);
        }
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
        if(!$article) {
            abort(404);
        }

        if($article->writer()['data']->id != Auth::guard(session('guard'))->user()->id) {
            return redirect(session('guard').'/article')->with('warning', 'Anda tidak berhak untuk mengubah Artikel tersebut.');
        }

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
            'cover_image' => 'image|nullable|max:3999'

        ]);

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $article = Articles::find($id);
        $article->category = $request->input('category');
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if($request->hasFile('cover_image')){
            $article->cover_image = $fileNameToStore;
        }

        $log = null;
        if($article->save()) {
            $log = Common::registerLog([
                'action' => "membuat perubahan pada artikelnya.",
                'target' => 'article',
                'prefix' => 'a-update',
                'target_id' => $article->id,
                'actor' => session('guard'),
                'actor_id' => Common::currentUser(session('guard'))->id
            ]);
        }

        if($log != null && $log == true) {
            return redirect (route(session('guard').'.article.index'))->with('success', 'Artikel berhasil diubah !');
        }

        return redirect (route(session('guard').'.article.edit', $id))->with('failed', 'Gagal mengubah artikel !');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $article = Articles::find($id);

        if($article->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$article->cover_image);
        }

        $unreg = null;
        if($article->delete()) {
            $unreg = Common::unregisterLog([
                'target' => 'article',
                'target_id' => $id
            ]);
        }
        if($unreg != null && $unreg) {
            return redirect()->back()->with('success', 'Artikel dihapus !');
        }

        return redirect()->back()->with('failed', 'Gagal menghapus artikel.');
    }

    /**
     * Get current logged in user
     *
     * @return mixed
     */
    private function currentUser() {
        return Auth::guard(session('guard'))->user();
    }
}
