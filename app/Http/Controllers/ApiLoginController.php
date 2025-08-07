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
            // Store token in session for logout or further use
            session(['external_token' => $data['token']]);
            return back()->with('success', $data['message'])->with('user', $data['user']);
        } else {
            return back()->withErrors(['login' => $data['message'] ?? 'Login failed.']);
        }
    }
}
