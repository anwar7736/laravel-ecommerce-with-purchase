<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Type;

class CategoryController extends Controller
{
    public function index()
    {
        $types=Type::all();
        $items=Category::paginate(20);
        return view('backend.categories.index', compact('items','types'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('category.create'))
        {
            abort(403, 'unauthorized');
        }
        $data=$request->validate([
             'name'=> 'required',
             'type_id'=> 'required',
        ]);
        
        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('categories'), $fileName);
            $data['image']=$fileName;
        }

        Category::create($data);

        return response()->json(['status'=>true ,'msg'=>'Category Is  Created !!','url'=>route('admin.categories.index')]);
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
        if(!auth()->user()->can('category.edit'))
        {
            abort(403, 'unauthorized');
        }

        $item=Category::find($id);
        $types=Type::all();
        return view('backend.categories.edit', compact('item','types'));
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
        if(!auth()->user()->can('category.edit'))
        {
            abort(403, 'unauthorized');
        }

        $category=Category::find($id);
        $data=$request->validate([
             'name'=> 'required',
             'type_id'=> 'required',
        ]);

        if($request->hasFile('image')) {
            deleteImage('categories', $category->image);
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('categories'), $fileName);
            $data['image']=$fileName;
        }
       
        $category->update($data);

        return response()->json(['status'=>true ,'msg'=>'Category Is Updated !!','url'=>route('admin.categories.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('category.delete'))
        {
            abort(403, 'unauthorized');
        }

        $category=Category::find($id);
        deleteImage('categories', $category->image);
        $category->delete();
        return response()->json(['status'=>true ,'msg'=>'Category Is Deleted !!']);

    }

}
