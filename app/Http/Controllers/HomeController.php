<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $email =$user->email ;
        $proyectos = Proyecto::where('responsable', '=', $email)->paginate(5);
        return view('home.home', compact('proyectos'));
    }
}
