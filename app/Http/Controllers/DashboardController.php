<?php

namespace App\Http\Controllers;

use App\Band;

class DashboardController extends Controller
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
        $bands = Band::get(); // TODO: Scope bands to user

        return view('dashboard', ['bands' => $bands]);
    }
}
