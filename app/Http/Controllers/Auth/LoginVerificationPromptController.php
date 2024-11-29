<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginVerificationPromptController extends Controller
{
    /**
     * Display the login verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedLogin()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : view('auth.verify-login');
    }
}