<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'], 
            'tel' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'login' => ['required', 'string', 'max:255', 'unique:'.User::class],   
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'tel' => $request->tel, 
            'login' => $request->login, 
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Вход пользователя после регистрации
        Auth::login($user);


        return redirect()->to('/');
    }
}