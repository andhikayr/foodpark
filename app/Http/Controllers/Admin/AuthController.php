<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login() : View
    {
        return view('admin.auth.login');
    }

    public function forgetPassword() : View
    {
        return view('admin.auth.forget-password');
    }

    public function resetPassword($token, Request $request) : View {
        return view('admin.auth.reset-password', ['request' => $request]);
    }

    public function storeResetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        Alert::success('Berhasil', 'Password anda telah berhasil diubah!');
        return to_route('admin.login')->with('status', __($status));
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login');
    }
}
