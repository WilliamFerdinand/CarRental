<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'noHP' => 'required',
            'noSIM' => 'required',
        ]);

        $user = new User([
            'namaUser' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'noHP' => $request->noHP,
            'noSIM' => $request->noSIM,
            'hakAkses' => "User",
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
}
