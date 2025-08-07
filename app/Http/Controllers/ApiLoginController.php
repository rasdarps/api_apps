<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('external-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'password' => 'required',
        ]);

        $response = Http::post('https://workabroad.yea.gov.gh/api/jobseeker/login', [
            'identifier' => $request->identifier,
            'password' => $request->password,
        ]);

        $data = $response->json();

        if ($response->successful() && isset($data['token'])) {
            session(['external_token' => $data['token']]);
            session(['user' => $data['user']]);
            return redirect()->route('jobseeker.dashboard');
        } else {
            return back()->withErrors(['login' => $data['message'] ?? 'Login failed.']);
        }
    }

    public function dashboard()
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('external.login');
        }
        return view('jobseeker.dashboard', compact('user'));
    }

    public function logout(Request $request)
    {
        $token = session('external_token');
        if ($token) {
            Http::withToken($token)->post('https://workabroad.yea.gov.gh/api/jobseeker/logout');
        }
        $request->session()->forget(['external_token', 'user']);
        return redirect()->route('external.login')->with('success', 'Logged out successfully.');
    }
}
