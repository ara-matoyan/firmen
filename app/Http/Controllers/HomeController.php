<?php

namespace Firmen\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Firmen\Praktikum;
use Firmen\Status;
use Firmen\State;
use Firmen\Job;
use Firmen\City;
use Firmen\Bdepartment;

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
		return redirect('praktikum');
    }

    public function options() {
        $status=Status::all();
        $state=State::all();
        $city=City::all();
        $job=Job::all();
        $bdepartment = Bdepartment::all();
        return view('options',['status'=>$status,'state'=>$state,'city'=>$city,'job'=>$job,'bdepartment'=>$bdepartment]);
        
    }

    
}

