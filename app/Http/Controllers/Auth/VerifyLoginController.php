<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\LoginVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyLoginController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(LoginVerificationPromptController $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedLogin()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markLoginAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
