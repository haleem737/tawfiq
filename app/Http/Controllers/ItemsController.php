<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use \DB;
use App\Item;
use Auth;
use App\User;
use App\Order;

class ItemsController extends Controller
{

    public function index()
    {
        return redirect()->route('login');
    }


    public function create()
    {
        return view('items.create');
    }


    public function store(Request $request){

        $this->validate($request, [
            'item_title' => 'required',
            'item_desc' => 'required'
        ]);

        $item = new Item;
        $item->user_id = Auth::user()->id;
        $item->item_title = $request->item_title;
        $item->item_desc = $request->item_desc;

        if(Input::hasFile('item_image')){
            $file = Input::file('item_image');
            $file->move('uploads' , $file->getClientOriginalName());
            $item->item_image  = $file->getClientOriginalName();
        }
        else{ $item->item_image  = 'no-image.jpg'; }

        if($item->save()){

            if(Auth::user()->open_order == 0){

                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->save();

                $last_order_no = $order->id;

                Schema::create('items_of_order_' . $last_order_no, function (Blueprint $table) {
                    $table->integer('order_id');
                    $table->integer('item_id');
                    $table->integer('qty');
                    $table->string('serial');
                    $table->timestamps();
                });

                DB::table('items_of_order_' . $last_order_no)->insert(
                    array(
                           'order_id'     =>   $last_order_no, 
                           'item_id'   =>   $item->id,
                           'qty'   =>   300,
                           'serial'   =>   '#0001'
                    )
               );
                               
                $user->open_order = 1;
                $user->active_order = $last_order_no;
                $user->save();
            
            }

            if(Auth::user()->open_order == 1){
                
                DB::table('items_of_order_' . Auth::user()->active_order)->insert(
                    array(
                           'order_id'     =>   Auth::user()->active_order, 
                           'item_id'   =>   $item->id,
                           'qty'   =>   10,
                           'serial'   =>   '#5001'
                    )
               );

            }
                
            return redirect()->route('home')->with('success', 'Post Created');
            
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
