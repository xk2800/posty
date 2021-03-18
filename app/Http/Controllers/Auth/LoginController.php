<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    //avoid being able to access this page after login
    public function __construct(){

        $this->middleware(['guest']); //avoid being able to access this page after login
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        //dd($request->remember);

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (!auth()->attempt($request->/*gives this array of data*/only('email', 'password'))) {
            return back()->with('status', 'Invalid login details entered');
        }

        return redirect()->route('dashboard');

        dd('ok');
    }
}
