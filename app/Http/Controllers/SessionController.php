<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function create() {
        return view('session.create');
    }

    public function store(Request $request) {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            /* The intended method will redirect the user to the URL they were attempting to access before being intercepted by the authentication middleware. 
            A fallback URI may be given to this method in case the intended destination is not available. */
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials do not match.',
        ]);
    }

    public function destroy(Request $request)
    {
        // Logs user out by removing authentication information from the session
        Auth::logout();

        // Invalidates the current session and regenerates the session ID. This ensures that the session data is not reused.
        $request->session()->invalidate();

        // Regenerates the CSRF token to prevent CSRF attacks.
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
