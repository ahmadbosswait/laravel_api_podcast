<?php

namespace App\Http\Controllers;

use App\Episode;
use App\User;

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
        $user_id = auth()->user()->id;
        //$user = User::find($user_id);
        $userEpisodes = Episode::where('user_id', $user_id)->paginate(10);
        return view('dashboard')->with('episodes', $userEpisodes);
    }
}
