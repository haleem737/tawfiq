<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Item;



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
        $email= Auth::user()->email;
        $user_id= Auth::user()->id;
        $client = User::whereEmail($email)->first();
        $items = Item::where('user_id', '=', $user_id)->get();        
        // return view('client.index', compact('client'))->with('items', $items);
        return view('/home', compact('client'));
    }
}
