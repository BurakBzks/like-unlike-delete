<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
    return view('auth.login');
    }

    public function operation(Request $request)
    {
        if (!auth()->attempt(request(['email', 'password']),$request->remember)) {
            return back()->with('status','The email or password is incorrect, please try again');

        }

        return redirect()->route('index');
    }

}
