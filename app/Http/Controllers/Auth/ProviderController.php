<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $SocialUser = Socialite::driver($provider)->user();
            if (User::where('email', $SocialUser->getId())->first())
                return redirect('/login')->withErrors(['email' => 'Silahkan Login Dengan Akun yang sudah di daftarkan']);

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id,
            ])->first();

            if (!$user) {
                $user = User::updateOrcreate([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'username' => User::generateUserName($SocialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                    'email_verified_at' => now()
                ]);
            } else {
                Auth::login($user);
                return redirect()->intended('/dashboard');
            }
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }

    // public function redirect()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function callback()
    // {
    //     try {
    //         $google_user = Socialite::drive('google')->user();

    //         $user = User::where('provider_id', $google_user->getId())->first();

    //         if (!$user) {
    //             $new_user = User::create([
    //                 'name' => $google_user->getName(),
    //                 'email' => $google_user->getEmail(),
    //                 'username' => User::generateUserName($google_user->getNickname()),
    //                 // 'provider' => $google_user,
    //                 'provider_id' => $google_user->getId(),
    //                 'provider_token' => $google_user->token,
    //                 'email_verified_at' => now()
    //             ]);
    //             Auth::login($new_user);
    //             return redirect()->intended('/dashboard');
    //         } else {
    //             Auth::login($user);
    //             return redirect()->intended('/dashboard');
    //         }
    //     } catch (\Throwable $th){
    //         // dd($th->getMessage());
    //         return redirect('/login');
    //         // return redirect()->intended('/dashboard');


    //     }
    // }
}
