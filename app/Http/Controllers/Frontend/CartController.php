<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use App\Utils\Util;

class CartController extends Controller
{

    public function __construct(Util $util){

        $this->util=$util;
    }


    public function index(){
        $cart = session()->get('cart', []);
        return view('frontend.cart.index', compact('cart'));
    }
    public function store(Request $request){
        
        
        
        $id=$request->product_id;
        $size=$request->size;
        $product = Product::findOrFail($id);

        $data=getProductInfo($product);

        $cart = session()->get('cart', []);

        $stock=$this->util->checkProductStock($id, $size);

        if($stock ==0){
            return response()->json(['success'=>false,'msg'=>' stock Note Available!']);
        }

  
        if(isset($cart[$id])) {
            $new_stock=$cart[$id]['quantity']+1;

            $stock=$this->util->checkProductStock($id, $size);

            if($stock <$new_stock){
                return response()->json(['success'=>false,'msg'=>' stock Note Available!']);
            }

            $cart[$id]['quantity']=$new_stock;
            $cart[$id]['size']=$size;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $data['price'],
                "discount" => $data['discount_amount'],
                "size" => $size,
                "image" => $product->image,
            ];
        }
        session()->put('cart', $cart);

        $view=view('frontend.partials.cart_sidebar')->render();
        $total_item=getTotalCart();
        return response()->json(['success'=>true,'msg'=>'Product added to cart successfully!','view'=>$view,'item'=>$total_item]);

    }

    public function edit(Request $request,$id)
    {
        if($id && $request->quantity){
            $qty=$request->quantity;
            $cart = session()->get('cart');
            $size=$cart[$id]["size"];
            

            $stock=$this->util->checkProductStock($product_id, $size);

            if($stock <$new_stock){
                return response()->json(['success'=>false,'msg'=>' stock Note Available!']);
            }

            $cart[$id]["quantity"] = $qty;
            session()->put('cart', $cart);
            return response()->json(['success'=>true,'msg'=>'Update cart successfully!']);
        }else{
            return response()->json(['success'=>false,'msg'=>' Something Went Wrong !']);
        }
    }


    public function destroy($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return response()->json(['success'=>true,'msg'=>'Product removed successfully !']);
        }else{
            return response()->json(['success'=>false,'msg'=>' Something Went Wrong !']);
        }
    }


}
