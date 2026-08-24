<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = (string) $request->input('password', '');
        $user = User::where('email', $email)->first();
        $storedPassword = $user?->getRawOriginal('password');
        $passwordMatches = false;

        if ($storedPassword !== null) {
            $hashInfo = password_get_info($storedPassword);
            $passwordMatches = hash_equals($storedPassword, $password);
        }

        if (! $user || ! $passwordMatches) {
            return back()
                ->withErrors(['email' => 'The provided credentials are incorrect.'])
                ->onlyInput('email');
        }

        if (password_get_info($storedPassword)['algo'] === 0) {
            $user->password = Hash::make($password);
            $user->saveQuietly();
        }

        Auth::login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'))
            ->with('status', 'Login successful.');
    }
}
