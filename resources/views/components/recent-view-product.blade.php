
<div class="row">
  <div class="col-lg-3 col-md-12 text-center recently pt-5">
    <h2 class="serif pt-5">Recently</h2>
    <h1 class="serif p-2">Viewed</h1>
  </div>

  @foreach($items as $item)
  <div class="col-lg-3 col-md-12 text-center">
    <a href="{{ route('front.products.show',[$item->id])}}" class="text-dark a-herf">
      <img src="{{ getImage('products', $item->image)}}" alt="Product" class="col-12 pb-3">
    <span class="p-0">{{$item->name}}</span><br>
    <br>
    </a>
  </div>
  @endforeach
</div>
