<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\City;
use App\DoctorSpecialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    /**
     * Create a new controller instance
     *
     * DocController constructor.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    /**
     * Show dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function dashboard()
    {
        $doctor = $this->currentUser();

        $since = new Carbon(Auth::guard('doctor')->user()->created_at);
        $data = [
            'role' => session('role'),
            'since' => $since,
            'warning' => null
        ];

        if($doctor->city_id == null || $doctor->gender == null || $doctor->biography == null) {
            $data['warning'] = 'Sepertinya anda belum melengkapi data diri anda, segera lengkapi data diri anda.';
        }
        return view('pages.dashboard')->with('data', $data);
    }

    /**
     * Show profile page
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function profile($id)
    {
        $doctor = $this->currentUser();
        if($doctor->id == $id) {
            $data = [
                'doctor' => $doctor
            ];

            return view('pages.profile')->with('data', $data);
        }
        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }

    /**
     * Show edit profile form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $doctor = $this->currentUser();
        if($doctor->id == $id) {
            $specialization = DoctorSpecialization::pluck('name', 'id');
            $cities = City::pluck('name', 'id');

            $data = [
                'doctor' => $doctor,
                'specialization' => $specialization,
                'cities' => $cities
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'profile_picture' => 'image|nullable|max:3999',
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'city_id' => 'required',
            'specialization_id' => 'required',
            'biography' => 'required|min:200'
        ]);

        $doctor = $this->currentUser();
        $img = null;

        if($request->hasFile('profile_picture')) {

            if( $doctor->profile_picture != "user-default.jpg") {
                Storage::delete('public/user_images/'.$doctor->profile_picture);
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

        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->city_id = $request->input('city_id');
        $doctor->specialization_id = $request->input('specialization_id');
        $doctor->biography = $request->input('biography');
        if($request->hasFile('profile_picture')) {
            $doctor->profile_picture = $img;
        }

        return redirect(route('doctor.profile', $doctor->id))->with('success', 'Profil berhasil diperbarui !');
    }

    /**
     * Show edit password form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editPass($id)
    {
        $doctor = $this->currentUser();
        if($doctor->id == $id) {
            $data = [
                'doctor' => $doctor
            ];
            return view('pages.profile-password')->with('data', $data);
        }

        return redirect()->back()->with('warning', 'Anda tidak berhak mengakses laman tersebut.');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePass(Request $request, $id)
    {
        $doctor = $this->currentUser();
        if($this->validatePass($request->input('old_password'))) {
            if($request->input('old_password') == $request->input('new_password')) {
                return redirect(route('doctor.password.edit', $doctor->id))->with('warning', 'Password baru tidak boleh sama dengan Password lama.');
            }

            $this->validate($request, [
                'old_password' => 'required|min:6',
                'new_password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
                'password_confirmation' => 'required|min:6'
            ]);

            $doctor->password = Hash::make($request->input('new_password'));
            $doctor->save();

            return redirect(route('doctor.profile', $doctor->id))->with('success', 'Password berhasil diubah !');
        }
        return redirect(route('doctor.password.edit', $doctor->id))->with('failed', 'Password lama tidak cocok.');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeImage()
    {
        $doctor = $this->currentUser();
        if($doctor->profile_picture != "user-default.jpg") {
            Storage::delete('public/user_images/'.$doctor->profile_picture);
        }

        $doctor->profile_picture = "user-default.jpg";
        if($doctor->save()) {
            return redirect(route('admin.profile.edit', $doctor->id))->with('success', 'Foto profil berhasil dihapus !');
        }
    }

    public function destroy() {
        $doctor = $this->currentUser();
        if($doctor->delete()) {
            return redirect(route('admin.login'))->with('success', 'Akun telah dihapus !');
        }
        return redirect(route('admin.dashboard'))->with('failed', 'Penghapusan akun gagal.');
    }

    /**
     * Get current logged in Doctor
     *
     * @return mixed
     */
    private function currentUser()
    {
        return Auth::guard('doctor')->user();
    }

    /**
     * @param string $oldPassword
     * @return bool
     */
    private function validatePass(string $oldPassword)
    {
        $doctor = $this->currentUser();
        if(Hash::check($oldPassword, $doctor->password)) {
            return true;
        }

        return false;
    }

}
