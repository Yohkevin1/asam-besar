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
        $users = User::all();
        return view('backend.pengguna', compact('users'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with(['message' => 'User created successfully', 'alert-type' => 'success']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with(['message' => 'User not found', 'alert-type' => 'error']);
        }
        $user->delete();
        return redirect()->back()->with(['message' => 'User deleted successfully', 'alert-type' => 'success']);
    }

    public function resetPassword(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|min:8|same:confirm_password|regex:/^(?:(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{10,})$/',
                'confirm_password' => 'required|same:password',
            ],
            [
                'password.required' => 'Masukkan password terbaru',
                'password.min' => 'Password minimal 8 karakter',
                'password.same' => 'Password Confrimation tidak cocok',
                'password.regex' => 'Password harus mengandung minimal satu huruf besar, satu huruf kecil, satu angka, dan satu karakter khusus',
                'confirm_password.required' => 'Password Konfirmasi diperlukan',
                'confirm_password.same' => 'Password Konfirmasi tidak cocok',
            ]
        );

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'alert-type' => 'error']);
        }

        $user = User::find($id);
        if (!$user) {
            return back()->with(['message' => 'User not found', 'alert-type' => 'error']);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with(['message' => 'Password Berhasil Dirubah', 'alert-type' => 'success']);
    }
}
