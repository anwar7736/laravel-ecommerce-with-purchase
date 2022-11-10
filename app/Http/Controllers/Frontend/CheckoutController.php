<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Utils\ModulUtil;
use App\Utils\Util;

class CheckoutController extends Controller
{
    public $modulutil;
    public $util;

    public function __construct(ModulUtil $modulutil, Util $util){

        $this->util=$util;
        $this->modulutil=$modulutil;
    }
    public function index(){
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('front.home');
        }

        return view('frontend.cart.checkout', compact('cart'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'mobile' => 'required|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'payment_method' => 'required',
            'delivery_type' => 'required',
            'shipping_address' => 'required',
            'city' => '',
            'state' => '',
            'zip_code' => '',
            'zip_code' => '',
        ]);

        $carts=session()->get('cart',[]);
        $product=[];
        if ($carts) {
            $total=0;
            $total_discount=0;
            foreach($carts as $key=>$item){
                $total +=$item['quantity'] * $item['price'];
                $total_discount +=$item['quantity'] * $item['discount'];
                $product[]=[
                    'product_id'=>$key,
                    'quantity'=>$item['quantity'],
                    'unit_price'=>$item['price'],
                    'size'=>$item['size'],
                ];

            }
        }

        $data['date']=date('Y-m-d');
        $data['user_id']=auth()->user()->id;
        $data['invoice_no']=time();
        $data['discount']=$total_discount;
        $data['amount']=$total_discount+$total;
        $data['final_amount']=$total;


        DB::beginTransaction();
        try {

            unset($data['payment_method']);
            $order=Order::create($data);

            if (!empty($product)) {

                foreach ($product as $key => $item) {
                    $this->util->decreaseProductStock($item['product_id'], $item['size'],$item['quantity']);
                }
                $order->details()->createMany($product);
            }


            

            $this->modulutil->orderPayment($order, $request->all());
            $this->modulutil->orderstatus($order);
            session()->put('cart',[]);
            DB::commit();
            return response()->json(['success'=>true,'msg'=>'Order Create successfully!','url'=>route('front.home')]);

        } catch (\Exception $e) {
            
            DB::rollback();

            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }

    }

}
