<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class C_Auth extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $data = Auth::user();
            session()->put('user', $data);
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Username atau Password Salah');
            return redirect()->back()->withInput();
        }
    }

    public function resetMyPassword(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'newPassword' => 'required|min:8|same:confirmPassword|regex:/^(?:(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{10,})$/',
                'confirmPassword' => 'required|same:newPassword',
            ],
            [
                'newPassword.required' => 'Masukkan password terbaru',
                'newPassword.min' => 'Password minimal 8 karakter',
                'newPassword.same' => 'Password Confrimation tidak cocok',
                'newPassword.regex' => 'Password harus mengandung minimal satu huruf besar, satu huruf kecil, satu angka, dan satu karakter khusus',
                'confirmPassword.required' => 'Password Konfirmasi diperlukan',
                'confirmPassword.same' => 'Password Konfirmasi tidak cocok',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with([
                'message' => $validator->errors()->first(),
                'alert-type' => 'error',
            ]);
        }
        $id = decrypt($id);
        $user = User::find($id);
        $user->password = bcrypt($request->newPassword);
        $user->save();
        return redirect()->back()->with(['message' => 'Password Berhasil', 'alert-type' => 'success']);
    }
}
