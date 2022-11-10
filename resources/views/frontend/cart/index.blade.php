@extends('frontend.app')
@section('content')
<!-- cover start  -->
<section class="mt-4">
    <div class="container mt-3">
        <h3 class="serif">Shopping Cart</h3>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <hr>

                <div class="row">
                    @php
                       $total=0;
                    @endphp

                    @forelse($cart as $key=>$item)
                    @php
                       $sub_total=$item['price'] *$item['quantity'];
                       $total +=$sub_total;
                    @endphp
                    <div class="col-lg-4 col-md-4 col-4 m-auto">
                        <a href="product.html">
                            <img src="{{ getImage('products',$item['image'])}}" alt="product" class="col-12">
                        </a>
                    </div>

                   
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="d-flex justify-content-between">
                            <div class="cart-product-details d-flex justify-content-between col-12">
                                <div class="cart_details">
                                    <a href="product.html" class="h-u text-dark font-m-sm"><b> {{$item['name']}} </b></a>
                                </div>
                                <div class="cart_options d-flex">
                                    <button class="btn" title="Cart Edit">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn" title="Add To Wish-list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <form action="{{ route('front.carts.destroy',[$key])}}" method="post" id="cart_remove_form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" title="Remove From Cart">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <p class="text-muted font-m-sm pt-3">Color: Pamona</p>
                        <p class="text-muted font-m-sm pt-3">Size: 29</p>
                        <p class="text-muted font-m-sm pt-3">#0045932308
                        </p>
                        <p>Cost: <span>${{$item['price']}}</span> * <span>{{$item['quantity']}}</span></p>
                        <p>Total Cost: <span>${{$sub_total}}</span></p>
                        <div class="text-center" style="border-radius: 30px; background-color: rgb(240, 240, 240); display: inline-block; padding: 5px">
                            <button class="border-0 ps-3 pe-3 subs_button" style="background: transparent;">-</button>
                            <span>QTY: 
                              <input type="text" name="qty" value="{{$item['quantity']}}" class="quantity" style="width:20%; text-align: center;" >
                            </span>
                        <button class="border-0 ps-3 pe-3 add_button" style="background: transparent;">+</button>
                      </div>

                        <h3 class="pt-4 text-center">Delivery</h3>
                        <p class="font-m-sm text-center"><i class="fas fa-truck"></i> Fast Shipping Receive by Monday, September 12</p>
                    </div>
                    @empty
                    @endforelse

                    <hr>
                    <h3 class="serif">Gift Options</h3>
                    <p class="font-sm">
                        Add the perfect finishing touch with our signature gift boxes </p>
                        <hr>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <hr style="visibility: hidden;">
                <div class="pt-5 d-block d-lg-none d-md-block"></div>
                <div class="card">
                    <div class="card-header">
                        ORDER SUMMARY
                    </div>
                    <div class="card-body font-m-sm">
                        <div class="d-flex justify-content-between">
                                <p>Subtotal</p>
                                <p>${{$total}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                                <p>Fast Shipping</p>
                                <p>Free</p>
                        </div>
                        <div class="d-flex justify-content-between">
                                <p><b>Estimated Total
                                </b></p>
                                <p><b>${{$total}}</b></p>
                        </div>
                        <p class="font-sm cuppon c-cursor">Apply Promo Code <i class="fas fa-chevron-down"></i></p>
                        <div class="cuppon-input" style="display: none;">
                          <div class="form-floating mb-3">
                            <input
                              type="text"
                              class="form-control" name="Label" id="Label" placeholder="Cuppon">
                            <label for="floatingLabel">Apply Cuppon Code</label>
                          </div>
                        </div>
                        <div class="p-2">
                            <hr>
                        </div>
                        <p class="text-center font-sm"><b>YOU QUALIFY FOR COMPLIMENTARY SHIPPING</b></p>
                        <div class="progress" style="height: 15px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <hr>
                        <div class="p-"></div>
                        <a href="checkout.html" class="btn text-center col-12 font-m-sm" style="background-color: rgb(1, 1, 31); color: white;">PROCESS TO CHECKOUT</a>
                        <p class="text-center font-m-">Or</p>

                        <div class="btn text-center col-12 font-m-sm border" style="color: white;"><img src="{{ asset('frontend/img/pp.png')}}" alt="paypal" class="" style="height: 25px;"></div>
                    </div>
                </div>
                <div class="help font-sm p-2">
                    <b>Need Help? </b> <span><a href="#" class="text-dark">Email,</a><a href="#" class="text-dark">Chat</a></span><span> Or Call 1-888-475-7674</span>
                </div>
            </div>
        </div>
        <br>
        <div class="recomended">
          <h3 class="serif pb-2 pt-2">Recomended for you</h3>
          <div class="row col-12">
              <div class="col-lg-3 col-md-4 product-div">
                  <a href="category.html" class="s-product">
                  <img src="{{ asset('frontend/img/product1.jpg')}}" alt="Product" class="col-12 pb-4">
                  <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
                </div>
                <div class="col-lg-3 col-md-4 product-div">
                  <a href="category.html" class="s-product">
                  <img src="{{ asset('frontend/img/pic1.jpg')}}" alt="Product" class="col-12 pb-4">
                  <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
                </div>
                <div class="col-lg-3 col-md-4 product-div">
                  <a href="category.html" class="s-product">
                  <img src="{{ asset('frontend/img/product2.jpg')}}" alt="Product" class="col-12 pb-4">
                  <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
                </div>
                <div class="col-lg-3 col-md-4 product-div">
                  <a href="category.html" class="s-product">
                  <img src="{{ asset('frontend/img/product4.jpg')}}" alt="Product" class="col-12 pb-4">
                  <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
                </div>
          </div>
      </div>
  </div>
</section>
<script src="assets/js/product.js"></script>
<!-- cover end  -->
<!-- recently veiw section  -->
<section class="mt-5 pt-5">
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-4 text-center recently pt-5">
      <h2 class="serif pt-5">Recently</h2>
      <h1 class="serif ps-5 pe-5">Viewed</h1>
    </div>
    <div class="col-lg-6 col-md-8 col-12 owl-carousel recently2">
      <div class="text-center">
        <a href="#" class="text-dark a-herf">
          <img src="assets/img/product2.jpg" alt="Product" class="col-12 pb-3">
        <span class="p-0">Polo Ralph Lauren</span><br>
        <a class="p-0 text-dark">Varick Slim Straight Distressed Jean</a><br>
        </a>
      </div>
      <div class="text-center">
        <a href="#" class="text-dark a-herf">
          <img src="assets/img/pic1.jpg" alt="Product" class="col-12 pb-3">
        <span class="p-0">Polo Ralph Lauren</span><br>
        <a class="p-0 text-dark">Varick Slim Straight Distressed Jean</a><br>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 text-center">
    </div>
  </div>
</div>
</section>
<!-- recently veiw section  -->
    
@endsection