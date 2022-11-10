<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;

class ProductDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Product::whereNotNull('discount_type')->paginate(30);
        return view('backend.product_discounts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('discount.create'))
        {
            abort(403, 'unauthorized');
        }

        return view('backend.product_discounts.create');
    }

    public function getDiscountProduct(Request $request){

        $data = Product::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);

    }

    public function productEntry(Request $request){

        $product = Product::select("*")
                    ->where('id',$request->get('product_id'))
                    ->get();

        if ($product) {
            $html='';
            foreach ($product as $key => $item) {
               $html.='<tr>
                        <td>'.$item->name.'</td>
                        <td>'.$item->category->name.'</td>
                        <td class="sell_price">'.$item->sell_price.'</td>

                        <td>
                            <select class="form-control dicount_type" name="dicount_type[]">
                                <option value="fixed">Fixed</option>
                                <option value="percentage">Percentage</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" step="any" name="dicount_amount[]" class="form-control dicount_amount" value="0">
                            <input type="hidden" name="product_id[]" value="'.$item->id.'">
                        </td>

                        <td>
                            <input type="number" step="any" name="after_discount[]" class="form-control after_discount" value="0">
                        </td>

                        <td>
                            <a class="remove action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>';
            }
            return response()->json(['data'=>$html]);
             
        }else{
            return response()->json(['data'=>'']);
        }
    
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('discount.create'))
        {
            abort(403, 'unauthorized');
        }

        // $data=$request->validate([
        //      'name'=> 'required'
        // ]);

        if (isset($request->product_id)) {
            
            foreach ($request->product_id as $key => $product_id) {
                $product=Product::find($product_id);
                $data=[
                        'discount_type'=>$request->dicount_type[$key],
                        'after_discount'=>$request->after_discount[$key],
                        'dicount_amount'=>$request->dicount_amount[$key],
                ];

                $product->update($data);
            }
        }

        return response()->json(['status'=>true ,'msg'=>'Product Is  Created !!','url'=>route('admin.product_discounts.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('discount.edit'))
        {
            abort(403, 'unauthorized');
        }

        $cats=Category::all();
        $item=Product::with('sizes')->find($id);
        $sizes=Size::all();
        return view('backend.products.edit', compact('item','cats','sizes'));
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
        if(!auth()->user()->can('discount.edit'))
        {
            abort(403, 'unauthorized');
        }

        $product=Product::find($id);
        $data=$request->validate([
             'name'=> 'required',
             'category_id'=> 'required',
             'description'=> '',
             'body'=> '',
             'purchase_price'=> 'required|numeric',
             'sell_price'=> 'required|numeric',
        ]);

        if($request->hasFile('image')) {
            deleteImage('products', $product->image);
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('products'), $fileName);
            $data['image']=$fileName;
        }

        if($request->hasFile('optional_image')) {
            deleteImage('products', $product->optional_image);
            $originName = $request->file('optional_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('optional_image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('optional_image')->move(public_path('products'), $fileName);
            $data['optional_image']=$fileName;
        }
    
        $product->update($data);

        if (isset($request->size_id)) {
            $product->sizes()->sync($request->size_id);
        }else{
            $product->sizes()->sync([]);
        }


        return response()->json(['status'=>true ,'msg'=>'Product Is Updated !!','url'=>route('admin.products.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('discount.delete'))
        {
            abort(403, 'unauthorized');
        }

        $product=Product::find($id);
        $data=[
                'discount_type'=>null,
                'after_discount'=>0,
                'dicount_amount'=>0,
        ];

        $product->update($data);
        return response()->json(['status'=>true ,'msg'=>'Product Is Deleted !!']);

    }
}
