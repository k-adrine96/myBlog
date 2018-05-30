<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::where('status', 1)->get();
        return view('home', ['posts'=>$posts, 'check'=>Auth::check()]);
    }

    public function userGet()
    {
        if (Auth::user()->is_admin) {
            $posts = Posts::all();
        } else {
            $posts = Posts::where('user_id', Auth::Id())->get();
        }
        return view('home', ['posts'=>$posts, 'check'=>Auth::check()]);
    }
}
