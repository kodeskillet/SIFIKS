<?php

namespace App\Http\Controllers;

use App\Thread;
use function GuzzleHttp\Promise\all;
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
    public function index()
    {
        $article = Articles::where('category','penyakit')->orderBy('created_at','desc')->take(3)->get();
        return view('home')->with('article', $article);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $data = [
            'user' => $this->currentUser(),
            'threads' => Thread::where('user_id', $this->currentUser()->id)->orderBy('created_at', 'desc')->paginate(3)
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
        return redirect()->back()->with('warning', 'Anda tidak berhak untuk mengakses laman tersebut.');
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
        return redirect()->back()->with('warning', 'Anda tidak berhak untuk mengakses laman tersebut.');
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

            return redirect (route('user.profile.edit', ['id' => $id]))->with('success', 'Profil berhasil diperbarui !');
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak untuk mengakses laman tersebut.');
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
            'old_password' => 'required|min:6',
            'new_password' => 'required_with:new_password_confirmation|same:new_password_confirmation|min:6',
            'new_password_confirmation' => 'required|min:6'
        ]);

        $user = $this->currentUser();

        if($this->validatePass($request->input('old_password'))) {
            $user->password = Hash::make($request->input('new_password'));

            if($user->save()) {
                session()->flush();

                return redirect(route('login'))->with('success', 'Password berhasil diubah ! Silahkan login kembali.');
            }
        }

        return redirect(route('user.password.edit', $user->id))->with('failed', 'Password lama tidak cocok.');
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
            return redirect(route('user.profile.edit', $user->id))->with('success', 'Foto profil dihapus !');
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
            return redirect(route('home'))->with('success', 'Akun berhasil dihapus !');
        }
    }


    /**
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('web')->user();
    }


    /**
     * @param string $oldPassword
     * @return bool
     */
    private function validatePass(string $oldPassword)
    {
        $user = $this->currentUser();
        if(Hash::check($oldPassword, $user->password)) {
            return true;
        }
        return false;
    }
}
