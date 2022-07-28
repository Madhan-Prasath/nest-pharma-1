<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;


class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try
        {
            $socialUser = Socialite::driver('google')->user();
        }

        catch (InvalidStateException $exception) {

            return redirect()->route('login')
                ->withErrors(
                    [
                        'email' =>  [
                                        __('Google Login failed, please try again.'),
                                    ],
                    ]
                );

        }

        // Very Important! Stops anyone with any google accessing auth!
        $googleLoginDomain = env('GOOGLE_LOGIN_DOMAIN', null);

        if (! Str::endsWith($socialUser->getEmail(), $googleLoginDomain)) {

            return redirect()->route('login')
                ->withErrors([
                    'email' => [
                        __('Only Domain email addresses are accepted.'),
                    ],
                ]);
        }

        $user = User::where('email', $socialUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar that might have changed
            $user->update([
                // 'avatar'   => $socialUser->avatar,
            ]);

            // $user_role = $user->getRoleNames();

            // if($user_role->count() == 0){

            //     $role = Role::where('name', '=', 'User')->firstOrFail();

            //     $user->roles()->attach($role->id);
            // }

        }
        else {
            // create a new user
            $user = User::create([
                'name'          => $socialUser->getName(),
                'email'         => $socialUser->getEmail(),
                // 'avatar'        => $socialUser->getAvatar(),
                'password'      => Str::random(32)
            ]);

            $role = Role::where('name', '=', 'User')->firstOrFail();

            $user->roles()->attach($role->id);
        }

        Auth::login($user);

        return redirect()->intended('/admin');
    }

}
