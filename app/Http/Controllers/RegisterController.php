<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function showw()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]);

        User::create(
            [
                'name'=>$request->name,
                'surname'=>$request->surname,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect()->route('index');



    }
}
