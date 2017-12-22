<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Item;

class AjaxController extends Controller
{
    public function index(){
        return view('ajax.index');
    }

    public function showItemDetails(){

        $item_id = $_GET['item_id'];

        $email= Auth::user()->all();
        $user_id= Auth::user()->id;
        $client = User::whereEmail($email)->first();
        $item = Item::where('user_id', '=', $user_id)->where('item_id', '=', $item_id)->get();
        
        return response($item);

    }



}
