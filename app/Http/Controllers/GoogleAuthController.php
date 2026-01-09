<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (! $user) {
            $user = User::create([
                'name' => $googleUser->getName() ?? $googleUser->getNickname() ?? $googleUser->getEmail(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                // No password required for social login, but store a random hash
                'password' => Hash::make(uniqid('google_', true)),
            ]);
        } else {
            // update google_id if missing
            if (! $user->google_id) {
                $user->google_id = $googleUser->getId();
                $user->save();
            }
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        if ($user->is_admin ?? false) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/');
    }
}
