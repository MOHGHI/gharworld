<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Overwrite the redirectTo property with this method
    public function redirectTo()
    {
        return Auth::user()->hasrole('admin')
            ? RouteServiceProvider::ADMIN_DASHBOARD
            : RouteServiceProvider::HOME;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::where(['email' => $socialUser->getEmail()])->first();

        if (!$user) {
            DB::beginTransaction();
            try {
                //code...
                $user = User::create([
                    'name'          => $socialUser->getName(),
                    'email'         => $socialUser->getEmail(),
                    'avatar'         => $socialUser->getAvatar(),
                    'provider_id'   => $socialUser->getId(),
                    'provider'      => $provider,
                ]);

                $user->syncRoles('user');
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                return redirect()->route('register')->with('registrationError', 'An unknown error occured');
            }
        }

        Auth::login($user, true);

        return redirect($this->redirectTo());
    }
}
