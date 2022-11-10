<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Category;
use App\Models\Size;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Product::paginate(30);
        return view('backend.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('product.create'))
        {
            abort(403, 'unauthorized');
        }

        $cats=Category::all();
        $sizes=Size::all();
        return view('backend.products.create', compact('cats','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('product.create'))
        {
            abort(403, 'unauthorized');
        }

        $data=$request->validate([
             'name'=> 'required',
             'image'=> 'required|image',
             'optional_image'=> 'nullable|image',
             'category_id'=> 'required',
             'description'=> '',
             'body'=> '',
             'purchase_price'=> 'required|numeric',
             'sell_price'=> 'required|numeric',
        ]);

        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('products'), $fileName);
            $data['image']=$fileName;
        }

        if($request->hasFile('optional_image')) {
            $originName = $request->file('optional_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('optional_image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('optional_image')->move(public_path('products'), $fileName);
            $data['optional_image']=$fileName;
        }
    
        $product=Product::create($data);

        if (isset($request->size_id)) {
            $product->sizes()->attach($request->size_id);
        }

        return response()->json(['status'=>true ,'msg'=>'Product Is  Created !!','url'=>route('admin.products.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('sizes','sizes.stocks')->find($id);
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('product.edit'))
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
        if(!auth()->user()->can('product.edit'))
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
        if(!auth()->user()->can('product.delete'))
        {
            abort(403, 'unauthorized');
        }

        $product=Product::find($id);
        deleteImage('products', $product->image);
        deleteImage('products', $product->optional_image);
        $product->delete();
        return response()->json(['status'=>true ,'msg'=>'Product Is Deleted !!']);

    }

    public function fileUpload(Request $request){

        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('ck-images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('ck-images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }

    }
}
