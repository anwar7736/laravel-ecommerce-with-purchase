<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Utils\Util;

class OrderController extends Controller
{
    public function __construct(Util $util){

        $this->util=$util;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Order::latest()->paginate(30);
        return view('backend.orders.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $item=Order::with('details','details.product','payments')->find($id);
        return view('backend.orders.show', compact('item'));
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
        if(!auth()->user()->can('order.delete'))
        {
            abort(403, 'unauthorized');
        }

        $item=Order::find($id);

        if($item->details()->count()){
            foreach ($item->details as $key => $line) {
                $this->util->increaseProductStock($line->product_id,$line->size,$line->quantity);
            }
            $item->details()->delete();
        }

        if($item->payments()->count()){
            $item->payments()->delete();
        }

        $item->delete();

        


        return response()->json(['status'=>true ,'msg'=>'Order Is Deleted !!']);
    }
}
