<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \DB;
use App\User;
use App\Item;

class OrdersController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }


    public function create()
    {
        $email= Auth::user()->email;
        $user_id= Auth::user()->id;
        $client = User::whereEmail($email)->first();
        $items = Item::where('user_id', '=', $user_id)->get();
        return view('orders.create', compact('client'))->with('items', $items);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $active_order = Auth::user()->active_order;
        
        $items_in_order = DB::table('items_of_order_' . $active_order)->get()->all();
        
        $array_item_ids = array_column($items_in_order, 'item_id');

        $items = Item::whereIn('item_id', $array_item_ids)->get();
            

        return view('orders.show')->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
