<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'home';
        return view('student.welcome', compact('pageTitle'));
    }
    public function redirects()
    {
    $usertype = Auth::user()->role;
        if($usertype == 'etudiant')
        {
            return redirect("/");
        }
        else
        {
            return "admin 22"; 
        }
    }

    public function redirects2()
    {
        $pageTitle = 'Your infos';
        return view('auth.studentInfos', compact('pageTitle'));
    }
}
