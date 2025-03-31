<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        Log::info('Redirecting user to Google OAuth.');
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google after authentication.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            // Get the user information from Google
            $googleUser = Socialite::driver('google')->user();

            Log::info('Google callback received', [
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
            ]);

            // Check if email exists (required for authentication)
            if (!$googleUser->email) {
                Log::warning('Google user has no email.', ['google_id' => $googleUser->id]);
                return redirect('/login')->with('error', 'No email associated with this Google account.');
            }

            // Update or create user in the database
            $user = User::updateOrCreate(
                ['google_id' => $googleUser->id],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(Str::random(16)), // Generate a secure random password
                ]
            );

            Log::info('User authenticated successfully', ['user_id' => $user->id]);

            // Log the user in with remember me option
            Auth::login($user, true);

            // Redirect based on user role
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/home');

        } catch (\Exception $e) {
            // Log the error with stack trace for debugging
            Log::error('Google authentication failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect('/login')->with('error', 'Something went wrong. Please try again.');
        }
    }
}
