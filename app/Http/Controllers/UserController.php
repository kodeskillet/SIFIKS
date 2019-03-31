<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Articles;
use App\User;


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

    public function profile() {
        $data = [
            'user' => $this->currentUser()
        ];
        return view('profile')->with('data', $data);
    }


    public function edit($id){
        $user = $this->currentUser();
        if($user->id == $id) {
            $data = [
                'user' => $user
            ];
            return view ('profile-edit')->with('data', $data);
        }
        return redirect()->back();
    }

    public function update(Request $request, $id){
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

        } elseif($img == "user-default.jpg" || $img == "user-default-male.png" || $img == "user-default-female.png") {
            if($request->input('gender') == "Laki - laki") {
                $img = "user-default-male.png";
            } else {
                $img = "user-default-female.png";
            }
        }


        if($this->currentUser()->id == $id) {
            $user->name = $request->input('name');
            $user->biography = $request->input('bio');
            $user->gender = $request->input('gender');
            if($request->hasFile('image')) {
                $user->profile_picture = $img;
            }
            $user->save();

            return redirect (route('user.profile.edit', ['id' => $id]));
        }

        return redirect()->back();
    }

    public function showArticle($id)
    {
        $article = Articles::find($id);
        return view('viewarticle')->with('article',$article);
    }

    public function index()
    {
        $article = Articles::orderBy('created_at','desc')->take(3)->get();
        return view('home')->with('article', $article);
    }

    public function removeImage() {
        $user = $this->currentUser();

        if( $user->profile_picture != "user-default.jpg" &&
            $user->profile_picture != "user-default-male.png" &&
            $user->profile_picture != "user-default-female.png") {

            Storage::delete('public/user_images/'.$user->profile_picture);
        }

        $user->profile_picture = "user-default.jpg";
        if($user->save()) {
            return redirect(route('user.profile.edit', $user->id));
        }
    }

    public function destroy() {
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

    private function currentUser() {
        $current = Auth::guard('web')->user();
        return $current;
    }
}
