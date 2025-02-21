<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $baseUrl = env('API_BASE_URL');

        Log::info('Login attempt', ['email' => $request->email,'baseUrl' => $baseUrl]);

        try {
            $response = Http::post($baseUrl . '/login', [
                'email' => $request->email,
                'password' => $request->password
            ]);

            Log::info('Login API Response', ['status' => $response->status(), 'body' => $response->json()]);

            if ($response->successful()) {
                Session::put('email', $request->email);
                Log::info('OTP generated for user', ['email' => $request->email]);

                return response()->json([
                    'success' => true,
                    'message' => 'OTP generated',
                ]);
            } else {
                Log::warning('Invalid login credentials', ['email' => $request->email, 'response' => $response->json()]);

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials',
                    'error' => $response->json(),
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Login error', ['email' => $request->email, 'error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $baseUrl = env('API_BASE_URL');
        $email = Session::get('email');

        if (!$email) {
            Log::warning('OTP verification failed due to missing session email');

            return response()->json([
                'success' => false,
                'message' => 'Email session expired. Please log in again.'
            ], 401);
        }

        Log::info('OTP verification attempt', ['email' => $email, 'otp' => $request->otp]);

        try {
            $response = Http::post($baseUrl . '/verify-otp', [
                'email' => $email,
                'otp' => $request->otp
            ]);

            Log::info('OTP verification API Response', ['status' => $response->status(), 'body' => $response->json()]);

            if ($response->successful()) {
                $data = $response->json();
                Session::put('token', data_get($data, 'token'));

                Log::info('OTP verified successfully', ['email' => $email]);

                return response()->json([
                    'success' => true,
                    'message' => 'OTP verified successfully.',
                    'redirect' => route('userAdmin')
                ]);
            } else {
                Log::warning('Invalid OTP entered', ['email' => $email, 'response' => $response->json()]);

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid OTP. Please try again.',
                    'error' => $response->json(),
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('OTP verification error', ['email' => $email, 'error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
