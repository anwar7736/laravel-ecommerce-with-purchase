<div class="cart-sidebar col-lg-4 col-md-6 col-12 card ms-auto" id="cart_section">
  <div class="container pt-2">
    <div class="d-flex justify-content-between">
      <a href="{{ route('front.carts.index')}}" class="a-herf text-dark"><h3 class="serif">Shopping Cart</h3></a>
      <button class="btn" id="cart-sidebar-close"><i class="fas fa-xmark"></i></button>
    </div>
    <hr>

    @php
       $cart=session()->get('cart');
       $total=0;
    @endphp

    @if($cart)
    @foreach($cart as $key=>$item)
    @php
       $sub_total=$item['price'] *$item['quantity'];
       $total +=$sub_total;
    @endphp
    <div class="row pt-2">
      <div class="col-lg-4 col-md-4 col-4 m-auto">
          <a href="product.html">
              <img src="{{ getImage('products',$item['image'])}}" alt="product" class="col-12">
          </a>
      </div>
      <div class="col-lg-8 col-md-8 col-12">
          <div class="d-flex justify-content-between">
              <div class="cart-product-details d-flex justify-content-between col-12">
                  <div class="cart_details">
                      <a href="product.html" class="h-u text-dark font-m-sm"><b>{{$item['name']}}</b></a>
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
          <p>Cost: <span>${{$item['price']}}</span> * <span>{{$item['quantity']}}</span></p>
          <p>Total Cost: <span>${{$sub_total}}</span></p>
          <div data-href="{{ route('front.carts.edit',[$key])}}" class="text-center" style="border-radius: 30px; background-color: rgb(240, 240, 240); display: inline-block; padding: 5px">
                <button class="border-0 ps-3 pe-3 subs_button" style="background: transparent;">-</button>
                <span>QTY: 
                  <input type="text" name="qty" value="{{$item['quantity']}}" class="quantity" style="width:20%; text-align: center;" >
                </span>
            <button class="border-0 ps-3 pe-3 add_button" style="background: transparent;">+</button>
          </div> <br><br>

      </div>
    </div>
    @endforeach
    @endif
    <div class="row pt-2">

      <hr class="col-11 m-auto">
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
            <p class="font-sm">Apply Promo Code <i class="fas fa-chevron-down"></i></p>
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
            <a href="{{ route('front.checkouts.index')}}" class="btn text-center col-12 font-m-sm" style="background-color: rgb(1, 1, 31); color: white;">PROCESS TO CHECKOUT</a>
            <p class="text-center font-m-">Or</p>

            <div class="btn text-center col-12 font-m-sm border" style="color: white;"><img src="{{ asset('frontend/img/pp.png')}}" alt="paypal" class="" style="height: 25px;"></div>
        </div>

    </div>
  </div>
</div>