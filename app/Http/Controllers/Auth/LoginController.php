<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);    
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validate request, catches an exception and redirect automatically if not valid
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Sign user in
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        //Redirect
        return redirect()->route('dashboard');
    }
}
