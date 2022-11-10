<div class="products row pt-4">

  @foreach($items as $product)

  @php
  	$data=getProductInfo($product);
  @endphp
  <div class="col-lg-3 col-md-4 col-12 font-sm pt-3">
    <a href="{{ route('front.products.show',[$product->id])}}" class="text-dark a-herf">
      <img src="{{ getImage('products',$product->image)}}" alt="Product" class="col-12 pb-3"></a>
    <span class="p-0">{{ $product->category_name}}</span><br>
    <a class="p-0 text-dark">{{ $product->name}}</a><br>
    <span class="p-0">

    	@if($data['discount_amount'] >0)
    	<del>${{ $product->sell_price}}</del>
    	@endif 

    ${{ $data['price']}}</span>

  </div>
  @endforeach

<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>
</div>