<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Articles;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'showArticle'
        ]]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $data = [
            'user' => $this->currentUser()
        ];
        return view('profile')->with('data', $data);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->currentUser();
        if($user->id == $id) {
            $data = [
                'user' => $user
            ];
            return view ('profile-edit')->with('data', $data);
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPass($id)
    {
        $user = $this->currentUser();
        if($user->id == $id) {
            $data = [
                'user' => $user
            ];
            return view ('profile-password')->with('data', $data);
        }
        return redirect()->back();
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'image' => 'image|nullable|max:3999'
        ]);

        $img = null;
        $user = $this->currentUser();

        if($request->hasFile('image')) {

            if( $user->profile_picture != "user-default.jpg" &&
                $user->profile_picture != "user-default-male.png" &&
                $user->profile_picture != "user-default-female.png") {

                Storage::delete('public/user_images/'.$user->profile_picture);
            }

            // Get Filename.ext
            $fileNameWExt = $request->file('image')->getClientOriginalName();
            // Get Filename
            $fileName = pathinfo($fileNameWExt, PATHINFO_FILENAME);
            // Get ext
            $ext = $request->file('image')->getClientOriginalExtension();
            // Filename To Store
            $img = $fileName.'_'.time().'.'.$ext;
            // Upload Image
            $path = $request->file('image')->storeAs('public/user_images', $img);

        } else {
            if ($request->input('gender') == "Laki - laki") {
                $img = "user-default-male.png";
            } else {
                $img = "user-default-female.png";
            }
        }


        if($this->currentUser()->id == $id) {
            $user->name = $request->input('name');
            $user->biography = $request->input('bio');
            $user->gender = $request->input('gender');
            $user->profile_picture = $img;
            $user->save();

            return redirect (route('user.profile.edit', ['id' => $id]));
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePass(Request $request, $id)
    {
        $this->validate($request, [
            'old' => 'required|min:6',
            'new' => 'required_with:new_conf|same:new_conf|min:6',
            'new_conf' => 'required|min:6'
        ]);

        if($this->validatePass($request->input('old'))) {
            $user = $this->currentUser();
            if($user->id == $id) {
                $user->password = Hash::make($request->input('new'));
                $user->save();

                return redirect(route('user.password.edit'));
            }
        }

        return redirect()->back();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showArticle($id)
    {
        $article = Articles::find($id);
        return view('viewarticle')->with('article',$article);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $article = Articles::orderBy('created_at','desc')->take(3)->get();
        return view('home')->with('article', $article);
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeImage()
    {
        $user = $this->currentUser();
        $img = null;

        if( $user->profile_picture != "user-default.jpg" &&
            $user->profile_picture != "user-default-male.png" &&
            $user->profile_picture != "user-default-female.png") {

            Storage::delete('public/user_images/'.$user->profile_picture);
        }

        if( $user->gender != null && $user->gender == "Laki - laki") {
            $img = "user-default-male.png";
        } elseif($user->gender != null && $user->gender == "Perempuan") {
            $img = "user-default-female.png";
        } else {
            $img = "user-default.jpg";
        }

        $user->profile_picture = $img;
        if($user->save()) {
            return redirect(route('user.profile.edit', $user->id));
        }
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        $user = $this->currentUser();
        if( $user->profile_picture != "user-default.jpg" &&
            $user->profile_picture != "user-default-male.png" &&
            $user->profile_picture != "user-default-female.png") {

            Storage::delete('public/user_images/'.$user->profile_picture);
        }

        if($user->delete()) {
            session()->flush();
            return redirect(route('home'));
        }
    }


    /**
     * @return mixed
     */
    private function currentUser()
    {
        $current = Auth::guard('web')->user();
        return $current;
    }


    /**
     * @param $pass
     * @return bool
     */
    private function validatePass($pass) {
        $user = $this->currentUser();
        $pass = Hash::make($pass);
        if($pass == $user->password) {
            return true;
        }
        return false;
    }
}
