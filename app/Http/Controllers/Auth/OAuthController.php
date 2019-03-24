<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = null;
        $err = null;

        if($provider == 'google') {
            $user = Socialite::driver($provider)->stateless()->user();
        } else {
            $user = Socialite::driver($provider)->user();
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        $attempt = Auth::guard('web')->attempt(['email' => $authUser->email, 'password' => $authUser->provider_id]);

        $req = new Request([
            'email' => $authUser->email,
        ]);

        if($attempt) {
            return redirect(route('home'));
        }
//        $this->sendFailedLoginResponse($req);
        return redirect(route('login'));
    }


    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    private function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->getEmail())->first();
        if($authUser) {
            return $authUser;
        }

        $newUser = new User;
        $newUser->email = $user->getEmail();
        $newUser->name = $user->getName();
        $newUser->password = Hash::make($user->id);
        $newUser->provider = $provider;
        $newUser->provider_id = $user->id;
        $newUser->save();

        return $newUser;
    }


    private function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);

    }

}
