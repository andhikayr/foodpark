<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index() : View {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request) : RedirectResponse {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
            'avatar' => 'nullable|max:2048|image|mimes:png,jpg,jpeg',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists("admin/uploads/profile_images/$user->avatar")) {
                unlink("admin/uploads/profile_images/$user->avatar");
            }
            $avatar = $request->file('avatar');
            $avatarName = 'profile_image_' . date('YmdHis') . '.' . $avatar->extension();
            $avatar->move('admin/uploads/profile_images', $avatarName);
            $user->avatar = $avatarName;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Alert::success('Sukses', 'Data profil anda telah berhasil diperbarui');
        return back();
    }

    public function updatePassword(Request $request) : RedirectResponse {
        $request->validate([
            'current_password' => 'required|current_password|max:255',
            'password' => 'required|min:8|confirmed|max:255',
            'password_confirmation' => 'required|min:8|max:255',
        ], [
            'password.confirmed' => 'Password baru dan konfirmasi password yang anda buat tidak cocok',
            'current_password.current_password' => 'Password lama anda tidak sesuai',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            Alert::toast('Password baru yang anda buat tidak boleh sama dengan password lama anda', 'error');
            return back();
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Sukses', 'Password anda telah berhasil diperbarui');
        return back();
    }
}
