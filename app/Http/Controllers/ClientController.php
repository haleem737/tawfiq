<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Item;

class ClientController extends Controller
{
    /* public function client($email){
        $client = User::whereEmail($email)->first();
        return view('client.index', compact('client'));
    }
    */

    public function new_job_order(){
        $email= Auth::user()->email;
        $user_id= Auth::user()->id;
        $client = User::whereEmail($email)->first();
        $items = Item::where('user_id', '=', $user_id)->get();        
        return view('client.new_job_order', compact('client'))->with('items', $items);
    }

    public function new_quotation(){
        $email= Auth::user()->email;
        $user_id= Auth::user()->id;
        $client = User::whereEmail($email)->first();
        $items = Item::where('user_id', '=', $user_id)->get();        
        return view('client.new_quotation', compact('client'))->with('items', $items);
    }


}
