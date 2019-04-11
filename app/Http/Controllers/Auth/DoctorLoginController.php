<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DoctorLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:doctor');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.doctor-login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Validate Data
        $validate = Validator::make($data, [
            'email' => 'required|exists:doctors|email',
            'password' => 'required|min:6'
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt Login
        if(Auth::guard('doctor')->attempt($credentials, $request->remember)) {
            // If 'true' -> redirect to admin.index
            session([
                'role' => 'Doctor',
                'guard' => 'doctor'
            ]);
            return redirect()->intended(route('admin.dashboard'));
        }
        // If 'false' -> send failed login response
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param Request $request
     */
    private function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
           'email' => [trans('auth.failed')],
        ]);
    }
}
