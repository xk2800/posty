<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //


    public function __construct(){
        //redirect when authentication fail -> redirect to login, after login success, redirect back to initial page
        $this->middleware(['auth']);
    }

    public function index(){
        //dd(auth()->user()->name);
        //dd(auth()->user()->posts);
        return view('dashboard');
    }
}
