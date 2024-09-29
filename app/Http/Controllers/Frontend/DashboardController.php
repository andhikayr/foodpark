<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index() : View
    {
        return view('frontend.dashboard');
    }

    public function updateProfile(Request $request) : RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
        ]);

        $user = Auth::user();
        $user->update($request->all());

        Alert::success('Sukses', 'Data profil anda telah berhasil diperbarui');
        return back();
    }

    public function updatePassword(Request $request) : RedirectResponse {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ], [
            'password.confirmed' => 'Password baru dan konfirmasi password yang anda buat tidak cocok',
            'current_password.current_password' => 'Password lama anda tidak sesuai',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            Alert::error('Error!', 'Password baru yang anda buat tidak boleh sama dengan password lama anda');
            return back();
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Sukses', 'Password anda telah berhasil diperbarui');
        return back();
    }

    public function updateAvatar(Request $request) {
        $request->validate([
            'avatar' => 'required|image|max:2048|mimes:png,jpg,jpeg',
        ]);

        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists('frontend/uploads/profile_images/' . $user->avatar)) {
                unlink('frontend/uploads/profile_images/' . $user->avatar);
            }
            $avatar = $request->file('avatar');
            $avatarName = 'profile_image_' . date('YmdHis') . '.' . $avatar->extension();
            $avatar->move('frontend/uploads/profile_images', $avatarName);
            $user->avatar = $avatarName;
            $user->save();
        }

        Alert::success('Sukses', 'Gambar profil anda telah berhasil diubah');
        return response()->json(['status' => 'success', 'avatar_url' => asset('frontend/uploads/profile_images/' . $user->avatar)]);
    }
}
