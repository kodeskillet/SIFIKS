<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Thread;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function dashboard()
    {
        $since = new Carbon(Auth::user()->created_at);

        $data = [
            'role' => session('role'),
            'since' => $since,
            'articles' => count(Articles::all()),
            'members' => count(User::all()),
            'threads' => count(Thread::all())
        ];
        return view('pages.dashboard')->with('data', $data);
    }


    /**
     * START OF ADMIN CRUD
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admin = Admin::all();
        $data = [
            'role' => session('role'),
            'admin' => $admin,
        ];
        return view('pages.admin')->with('data',$data);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $data = [
            'role' => session('role')
        ];
        return view ('pages.ext.add-admin')->with('data',$data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'min:6'
        ]);

        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));

        if($admin->save()) {
            return redirect (route('admin.index'))->with('success', 'Admin berhasil di tambahkan !');
        }

        return redirect (route('admin.index'))->with('failed', 'Gagal menambah admin !');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function profile($id)
    {
        $admin = $this->currentUser();
        if ($admin->id == $id) {
            $data = [
                'admin' => $admin
            ];
            return view('pages.profile')->with('data', $data);
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editProfile($id)
    {
        $admin = $this->currentUser();
        if ($admin->id == $id) {
            $data = [
                'admin' => $admin
            ];
            return view('pages.profile-edit')->with('data', $data);
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProfile(Request $request, $id)
    {
        $admin = $this->currentUser();
        if ($admin->id == $id) {
            $this->validate($request, [
                'profile_picture' => 'image|nullable|max:3999',
                'email' => 'required|email',
                'name' => 'required|min:3'
            ]);

            $img = null;

            if($request->hasFile('profile_picture')) {

                if( $admin->profile_picture != "user-default.jpg") {
                    Storage::delete('public/user_images/'.$admin->profile_picture);
                }

                // Get Filename.ext
                $fileNameWExt = $request->file('profile_picture')->getClientOriginalName();
                // Get Filename
                $fileName = pathinfo($fileNameWExt, PATHINFO_FILENAME);
                // Get ext
                $ext = $request->file('profile_picture')->getClientOriginalExtension();
                // Filename to Store
                $img = $fileName.'_'.time().'.'.$ext;
                // Upload Image
                $path = $request->file('profile_picture')->storeAs('public/user_images', $img);
            }

            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            if($request->hasFile('profile_picture')) {
                $admin->profile_picture = $img;
            }
            $admin->save();

            return redirect(route('admin.profile', $admin->id))->with('success', 'Profil berhasil diubah !');
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak melakukan transaksi tersebut.');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editPass($id)
    {
        $admin = $this->currentUser();
        if($admin->id == $id) {
            $data = [
                'admin' => $admin
            ];
            return view('pages.profile-password')->with('data', $data);
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }


    /**
     * @param Request $request
     * @param $id
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePass(Request $request, $id)
    {
        $admin = $this->currentUser();
        if($admin->id == $id) {

            $this->validate($request, [
                'old_password' => 'required|min:6',
                'new_password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
                'password_confirmation' => 'required|min:6'
            ]);

            if($this->validatePass($request->input('old_password'))) {
                $admin->password = Hash::make($request->input('new_password'));
                $admin->save();

                return redirect(route('admin.profile', $admin->id))->with('success', 'Password berhasil diubah !');
            }

            return redirect(route('admin.password.edit', $admin->id))->with('failed', 'Password lama tidak cocok.');
        }

        return false;
    }

    public function log($id)
    {
        $admin = $this->currentUser();
        if($admin->id == $id) {
            $data = [
                'admin' => $admin
            ];
            return view('pages.log')->with('data', $data);
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeImage()
    {
        $admin = $this->currentUser();
        if($admin->profile_picture != "user-default.jpg") {
            Storage::delete('public/user_images/'.$admin->profile_picture);
        }

        $admin->profile_picture = "user-default.jpg";
        if($admin->save()) {
            return redirect(route('admin.profile.edit', $admin->id))->with('success', 'Foto profil berhasil dihapus !');
        }
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy() {
        $admin = $this->currentUser();

        if($admin->delete()) {

            session()->flush();
            return redirect(route('admin.login', $admin->id))->with('success', 'Akun berhasil dihapus !');
        }
        return redirect(route('admin.profile', $admin->id))->with('failed', 'Gagal menghapus akun !');

    }


    /**
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('admin')->user();
    }


    /**
     * @param string $oldPassword
     * @return bool
     */
    private function validatePass(string $oldPassword)
    {
        $admin = $this->currentUser();
        if(Hash::check($oldPassword, $admin->password)) {
            return true;
        }

        return false;
    }


}
