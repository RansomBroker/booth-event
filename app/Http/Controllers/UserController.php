<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class UserController extends Controller
{
    public function loginView()
    {
        return view("auth.login");
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Silahkan cek kembali informasi login anda');
        return back();
    }

    public function registerView()
    {
        return view("auth.register");
    }

    public function register(Request $request, User $user)
    {
        $validation = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        $data = $validation;
        $data['password'] = bcrypt($validation['password']);
        $data['role'] = 1;
        $user->create($data);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil melakukan registrasi');
        return redirect()->route('user.login.view');
    }

    public function loginAdminView()
    {

    }

    public function adminAuth(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
