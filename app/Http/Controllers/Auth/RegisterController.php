<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class RegisterController extends Controller
{
    //

    //avoid being able to access this page after login
    public function __construct(){

        $this->middleware(['guest']); //avoid being able to access this page after login
    }


    public function index(){
        return view('auth/register');
    }

    public function store(Request $request){
        //validate request
                //dd($request);
                //dd($request->email);
            $this->validate($request, [
                'name' => 'required|max:255',
                'username' => 'required|max:255|unique:users,username',
                'email' => 'required|email|max:255',
                'password' => 'required|confirmed', //look for other data with _confirmed name, will check both input same

            ]);


            //dd('store');
        //store user
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


            //using auth helper
            //auth()->user(); //return user model or null
            auth()->attempt($request->/*gives this array of data*/only('email', 'password'));

        //sign user in
            return redirect()->route('dashboard');


        //redirect
    }
}
