<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;

class ProductController extends Controller
{
    public function index(Request $request){
        $type_id=request('type_id');
        $category_id=request('category_id');
        $category='';
        if(!empty($category_id)){
            $category=Category::find($category_id)->name;
        }
        
        if ($request->ajax()) {

            $type_id=request('type_id');
            $cat_id=request('cat_id');
            $size_id=request('size_id');

            $query=DB::table('products as p')
                        ->Leftjoin('categories as c','c.id','p.category_id')
                        ->Leftjoin('product_sizes as ps','ps.product_id','p.id')
                        ->select('p.id','p.name','p.purchase_price','p.sell_price','c.name as category_name','p.image','p.category_id','p.after_discount','p.dicount_amount');
            if(!empty($cat_id)){
                $query->whereIn('p.category_id',$cat_id);
            } 

            if(!empty($type_id)){
                $query->where('c.type_id',$type_id);
            } 

            if(!empty($size_id)){
                $query->whereIn('ps.size_id',$size_id);
            }    

            $items=$query->groupBy('p.id','p.name','p.purchase_price','p.sell_price','c.name','p.image','p.category_id','p.after_discount','p.dicount_amount')->paginate(30);

            return view('frontend.products.product_section', compact('items'))->render();
        }



        $cats=Category::all();
        $sizes=Size::with('stocks')->get();

   
        return view('frontend.products.index', compact('cats','category','sizes'));
    }

    public function show($id)
    {

        $recent_product = session()->get('recent_product', []);

        // dd($recent_product);
  
        if(!in_array($id,$recent_product)) {
           array_push($recent_product,$id);
           session()->put('recent_product', $recent_product);
        } 

        $product=Product::with('sizes')->find($id);
        $products=Product::where('id','!=',$id)->where('category_id', $product->category_id)->take(4)->get();

        return view('frontend.products.show', compact('product','products'));
    }

}
