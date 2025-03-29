<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        Log::info('Redirecting user to Google OAuth.');
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            Log::info('Google callback received', [
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
            ]);

            if (!$googleUser->email) {
                Log::warning('Google user has no email.', ['google_id' => $googleUser->id]);
                return redirect('/login')->with('error', 'No email associated with this Google account.');
            }

            $user = User::updateOrCreate(
                ['google_id' => $googleUser->id],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(str()->random(16)), // Store a secure random password
                ]
            );

            Log::info('User authenticated successfully', ['user_id' => $user->id]);

            Auth::login($user, true); // Remember login session

            return redirect()->intended('/home');
        } catch (\Exception $e) {
            Log::error('Google authentication failed', ['error' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Something went wrong. Please try again.');
        }
    }
}
