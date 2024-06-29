<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class C_Users extends Controller
{
    public function index()
    {
        $loggedInUserId = auth()->id();
        $users = User::where('id', '!=', $loggedInUserId)->get();
        return view('backend.pengguna', compact('users'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|max:20|regex:/^(?:(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{10,})$/',
                'confirm_password' => 'required|same:password'
            ],
            [
                'password.regex' => 'Password harus mengandung minimal satu huruf besar, satu huruf kecil, satu angka, dan satu karakter khusus',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 20 karakter',
                'password.same' => 'Konfirmasi password tidak cocok',
            ]
        );

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with(['message' => 'User berhasil ditambah', 'alert-type' => 'success']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with(['message' => 'User not found', 'alert-type' => 'error']);
        }
        $user->delete();
        return redirect()->back()->with(['message' => 'User berhasil di hapus', 'alert-type' => 'success']);
    }

    public function resetPassword(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|min:8|max:20|same:confirm_password|regex:/^(?:(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{10,})$/',
                'confirm_password' => 'required|same:password',
            ],
            [
                'password.required' => 'Masukkan password terbaru',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 20 karakter',
                'password.same' => 'Konfirmasi password tidak cocok',
                'password.regex' => 'Password harus mengandung minimal satu huruf besar, satu huruf kecil, satu angka, dan satu karakter khusus',
                'confirm_password.required' => 'Konfirmasi password diperlukan',
                'confirm_password.same' => 'Konfirmasi password tidak cocok',
            ]
        );

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $user = User::find($id);
        if (!$user) {
            return back()->with(['message' => 'User tidak ditemukan', 'alert-type' => 'error']);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with(['message' => 'Password Berhasil diubah', 'alert-type' => 'success']);
    }
}
