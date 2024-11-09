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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create user with is_admin field (Assuming is_admin is a boolean field)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // For simplicity, let's assume you want to set the default user role to regular user (is_admin = 0)
            'is_admin' => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Check if the user is an admin or regular user and redirect accordingly
        if ($user->is_admin) {
            // Redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // Redirect to the user dashboard
        return redirect()->route('user.dashboard');
    }
}
