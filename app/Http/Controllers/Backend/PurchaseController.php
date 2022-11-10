<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseLine;
use App\Models\PurchasePayment;
use App\Models\Supplier;
use App\Utils\Util;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public $util;

    public function __construct(Util $util){
        $this->util=$util;
    }


    public function index()
    {
        $items=Purchase::with('lines')->paginate(30);
        return view('backend.purchase.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasRole('admin'))
        {
            abort('403', 'Unauthorized');
        }
        
        $suppliers=Supplier::all();

        return view('backend.purchase.create', compact('suppliers'));
    }

    public function getPurchaseProduct(Request $request){

        $data = ProductSize::join('products' ,'products.id','product_sizes.product_id')
                    ->join('sizes' ,'sizes.id','product_sizes.size_id')
                    ->select("product_sizes.id",

                        DB::raw("TRIM(CONCAT(products.name,' (',sizes.title,')')) AS value")
                        )
                    ->where('products.name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();

    
        return response()->json($data);

    }


    public function purchaseProductEntry(Request $request){

        $id=$request->id;
        $product_size=ProductSize::find($id);

        if ($product_size) {
            $html='<tr><td>'.$product_size->product->name.'</td>
                    <td>'.$product_size->size->title.'</td>
                    <td>
                        <input class="form-control quantity" name="quantity[]" type="number" value="1" required min="1"/>
                        <input type="hidden" class="form-control" name="product_id[]" type="number" value="'.$product_size->product->id.'" required/>
                        <input type="hidden" class="form-control" name="size_id[]" type="number" value="'.$product_size->size_id.'" required/>
                    </td>
                    <td><input class="form-control unit_price" name="unit_price[]" type="number" value="'.$product_size->product->purchase_price.'" required/></td>
                    <td class="row_total">'.$product_size->product->purchase_price.'</td>
                    <td><a class="remove btn btn-sm btn-danger"> - </tr> ';

            return response()->json(['success'=>true,'html'=>$html]);
        }else{
            return response()->json(['success'=>false,'msg'=>'Product Note Found !!']);
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
        if(!auth()->user()->hasRole('admin'))
        {
            abort('403', 'Unauthorized');
        }

        $data=$request->validate([
             'supplier_id'=> 'required',
             'note'=> '',
             'date'=> 'required',
             'status'=> 'required',
             'discount_type'=> '',
             'discount_amount'=> '',
             'shipping_cost'=> '',
             'amount'=> 'required|numeric',
             'ref'=> '',
        ]);
        $data['user_id']=auth()->user()->id;
        if(empty($request->ref))
        {
            $data['ref'] = 'ref'.rand(111111,999999);
        }

        DB::beginTransaction();

        try {

            $purchase=Purchase::create($data);

            if (isset($request->product_id)) {
                $data=[];

                foreach ($request->product_id as $key => $product_id) {
                    $qty=$request->quantity[$key];
                    $size_id=$request->size_id[$key];
                    $data[]=[
                        'product_id'=>$product_id,
                        'size_id'=>$size_id,
                        'quantity'=>$qty,
                        'unit_price'=>$request->unit_price[$key],

                    ];
                    $this->util->increaseProductStock($product_id,$size_id,$qty);
                }
                $purchase->lines()->createMany($data);
            }


            // if (!empty(request('payment_amount'))) {
                
            //     $pay=[
            //         'purchase_id'=>$purchase->id,
            //         'amount'=>$request->payment_amount,
            //         'method'=>$request->method,
            //         'date'=>$request->date,
            //         'note'=>$request->pay_note,
            //         'account_id'=>$request->account_id,
            //     ];
            //     PurchasePayment::create($pay);
            // }

            // $this->util->purchaseStatus($purchase);

            DB::commit();
            return response()->json(['status'=>true ,'msg'=>'Purchase Is  Created !!','url'=> route('admin.purchase.index')]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false ,'msg'=>$e->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchases = DB::table('purchases')
                    ->join('suppliers', 'purchases.supplier_id', 'suppliers.id')
                    ->join('users', 'purchases.user_id', 'users.id')
                    ->where('purchases.id', $id)
                    ->select('purchases.*', 'suppliers.name', 'users.first_name', 'users.last_name')
                    ->get();

        $items=PurchaseLine::where('purchase_id', $id)->get();
        return view('backend.purchase.show', compact('items', 'purchases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasRole('admin'))
        {
            abort('403', 'Unauthorized');
        }

        $item=Purchase::with('lines')->find($id);
        $suppliers=Supplier::all();
        return view('backend.purchase.edit', compact('item','suppliers'));
        
    }


    public function update(Request $request, $id)
    {
        if(!auth()->user()->hasRole('admin'))
        {
            abort('403', 'Unauthorized');
        }

        $purchase=Purchase::find($id);
        $data=$request->validate([
             'supplier_id'=> 'required',
             'note'=> '',
             'date'=> 'required',
             'status'=> 'required',
             'discount_type'=> '',
             'discount_amount'=> '',
             'shipping_cost'=> '',
             'amount'=> 'required|numeric',
             'ref'=> '',
        ]);
        $data['user_id']=auth()->user()->id;

         DB::beginTransaction();

        try {

            $purchase->update($data);

            // delete purchase line and decrease product stock
            if (isset($request->purchase_line_id)) {
                $delete_line=PurchaseLine::where('purchase_id', $id)
                                ->whereNotIn('id', $request->purchase_line_id)
                                ->get();


                if ($delete_line->count()) {
                    foreach ($delete_line as $key => $line) {
                        $this->util->decreaseProductStock($line->product_id, $line->size_id, $line->quantity);
                        $line->delete();
                    }
                }
            }
            else{
                foreach ($purchase->lines as $key => $line) {
                    $this->util->decreaseProductStock($line->product_id, $line->size_id, $line->quantity);
                    $line->delete();
                }
            }
            // update purchase line and product stock
            if (isset($request->product_id)) {
                $data=[];



                foreach ($request->product_id as $key => $product_id) {
                    //product stock increase/decrease
                    if (isset($request->purchase_line_id[$key])) {

                        
                        $qty=$request->quantity[$key];
                        $line_id=$request->purchase_line_id[$key];
                        $line=PurchaseLine::find($line_id);



                        $this->util->updateProductStock($line->product_id, $line->size_id, $line->quantity,$qty);
                        $line->quantity=$qty;
                        $line->unit_price=$request->unit_price[$key];
                        $line->save();

                    }
                    //product stock increase
                    else{

                       
                        $qty=$request->quantity[$key];
                        $data[]=[
                            'product_id'=>$product_id,
                            'quantity'=>$qty,
                            'size_id'=>$request->size_id[$key],
                            'unit_price'=>$request->unit_price[$key],
                        ];
                        $this->util->increaseProductStock($product_id,$line->size_id, $qty);                    
                    }
                    
                }
                if (!empty($data)) {
                    $purchase->lines()->createMany($data);
                }
                
            }

            DB::commit();
            return response()->json(['status'=>true ,'msg'=>'Purchase Is  Updated !!','url'=> route('admin.purchase.index')]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false ,'msg'=>$e->getMessage()]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(!auth()->user()->can('purchase.delete'))
        {
            abort('403', 'Unauthorized');
        }

        $purchase=Purchase::find($id);

        foreach ($purchase->lines as $key => $line) {
            $this->util->decreaseProductStock($line->product_id, $line->size_id,$line->quantity);
            $line->delete();
        }

        $purchase->delete();
        return response()->json(['status'=>true ,'msg'=>'Deleted Successfully !!']);
        

    }


}
