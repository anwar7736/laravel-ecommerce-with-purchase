@extends('frontend.app')
@section('content')
<section class="">
    <div class="container mt-5">
        <form action="{{ route('front.checkouts.store')}}" class="pt-4" method="post" id="checkout_form">
          @csrf
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">

                <h1 class="serif">Checkout</h1>
                <hr>
                <h3 class="serif d-flex"><div class="rounded-circle me-3" style="height: 35px; width: 35px; text-align: center; background-color: #041e3a; color: white;">1</div> Shipping Address</h3>

                <form action="" class="pt-4">
                    <div class="ps-5">
                      <h5 class="serif">Contact Information</h5>
                      <div class="row">
                          <div class="col-lg-6 col-md-12 col-12 pt-3">
                                <label for="first-name">First Name *</label>
                                <input type="text" id="first-name" value="{{ auth()->user()->first_name}}" name="first_name" class="p-3 col-12">
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 pt-3">
                                <label for="last-name">Last name *</label>
                                <input type="text" value="{{ auth()->user()->last_name}}" id="last-name" name="last_name" class="p-3 col-12">
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 pt-3">
                                <label for="phone">Phone Number *</label>
                                <input type="text" placeholder="Your Phone Number" id="phone" name="mobile" class="p-3 col-12">
                            </div>
                      </div>
                      <h5 class="serif pt-5">Shipping Information</h5>
                      <div class="row">
                          <div class="col-lg-12 col-md-12 col-12 pt-3">
                              <label for="street-address">Street Address *</label>
                              <input type="text" id="street-address" name="shipping_address" placeholder="Stree Address" class="p-3 col-12">
                          </div>
                          <a href="#?" class="font-sm text-dark" id="address-manually">Enter Address Manually</a>
                          <div class="col-lg-12 col-12 row address-manually" style="display: none;">
                              <div class="col-lg-12 col-md-12 col-12 pt-3">
                                  <label for="appertment">Appertment (Optional)</label>
                                  <input type="text" name="appertment" id="appertment" placeholder="Appertment (Optional)" class="p-3 col-12">
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 pt-3">
                                  <label for="city">City *</label>
                                  <input type="text" id="city" name="city" placeholder="City" class="p-3 col-12">
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 pt-3">
                                  <label for="city">State *</label>
                                    <input type="text" id="state" placeholder="State" name="state" class="p-3 col-12">
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 pt-3">
                                  <label for="zip">Zip Code *</label>
                                  <input type="text" id="zip" placeholder="Zip Code" class="p-3 col-12" name="zip_code">
                              </div>
                          </div>
                          <p class="font-sm pt-4">Notify me of special offers and Ralph Lauren exclusives via: <input type="checkbox" class="pt-4"> Email</p>
                          <div class="p-3"></div>
                      </div>
                    </div>
                    
                    <hr>
                    <h3 class="serif d-flex text-muted"><div class="rounded-circle me-3" style="height: 35px; width: 35px; text-align: center; background-color: #041e3a; color: white;">2</div> Delivery Options</h3>
                    <div class="delivery-option ps-lg-5 pt-3 pb-2">
                      <div class="mb-3">
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            id="radio1"
                            name="delivery_type"
                            value="1"
                          />
                          <label class="form-check-label" for="radio1">Office Pickup</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            id="radio2"
                            name="delivery_type"
                            value="2" checked
                          />
                          <label class="form-check-label" for="radio2">Home Delivery</label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <h3 class="serif d-flex text-muted"><div class="rounded-circle me-3" style="height: 35px; width: 35px; text-align: center; background-color: #041e3a; color: white;">3</div> Your Billing Information</h3>
                    <div class="payment-option ps-lg-5 pt-3">
                      <div class="mb-3">
                        <div class="form-check form-check-inline via_card2">
                          <input
                            class="form-check-input"
                            type="radio"
                            id="via_card"
                            name="payment_method"
                            value="stripe"
                            
                          />
                          <label class="form-check-label" for="via_card">
                            <i class="fa-brands fa-cc-mastercard"></i> Via Card
                          </label>
                        </div>
                        <div class="form-check form-check-inline via_paypal">
                          <input
                            class="form-check-input"
                            type="radio"
                            id="paypal"
                            name="payment_method"
                            value="paypal"
                          />
                          <label class="form-check-label" for="paypal">
                            <i class="fa-brands fa-cc-paypal"></i> Paypal
                          </label>
                        </div>
                        <div class="form-check form-check-inline case_on_delivery2">
                          <input
                            class="form-check-input"
                            type="radio"
                            id="case_on_delivery"
                            name="payment_method"
                            value="cash"
                            checked
                          />
                          <label class="form-check-label" for="case_on_delivery">
                            <i class="fa-solid fa-money-bill"></i> Case On Delivery
                          </label>
                        </div>
                      </div>
                      <div class="via_card_box card border border-muted pt-3 mt-3" style="display: none;">
                        <div class="text-center">
                          <h3>Pay Via Your Card</h3>
                        </div>
                        
                          <div class="form-floating m-3">
                            
                            <select class="form-control" id="card_type">
                              <option selected disabled>Select Card Type</option>
                              <option value="MasterCard">MasterCard</option>
                              <option value="Visa">Visa</option>
                              <option value="JCB">JCB</option>
                              <option value="American_Express">American Express</option>
                            </select>
                            <label for="card_type">Select Card</label>
                          </div>
                          <div class="form-floating m-3">
                            <input
                              type="text"
                              class="form-control" name="card_number" id="card_number" placeholder="Card Number">
                            <label for="floatingLabel">Card Number</label>
                          </div>
                          <div class="form-floating m-3">
                            <input
                              type="text"
                              class="form-control" name="Name" id="Name" placeholder="Enter Your Name">
                            <label for="floatingLabel">Name</label>
                          </div>
                          <div class="m-3">
                            <label for="">Valid Until</label>
                            <div class="d-flex form-floating">
                              <input type="number" min="01" max="12" step="1" value="3" class="p-1 me-2 form-control" />
                              <input type="number" min="1900" max="2099" step="1" value="2016" class="p-1 ms-2 form-control" />
                            </div>
                          </div>
                          <div class="form-floating m-3">
                            <input
                              type="text"
                              class="form-control" name="cvc" id="cvc" placeholder="Enter CVC">
                            <label for="floatingLabel">CVC</label>
                          </div>
                          <a href="#pay" class="btn btn-primary text-center ms-auto m-3" style="width: 130px;" >Go to pay</a>
                        
                      </div>
                      <div class="paypal_box border border-muted text-center card" style="display: none;">
                        
                        <div class="card-body text-start">
                          <div class="text-center pt-3 pb-3">
                            <img src="{{ asset('frontend/img/pp.png')}}" alt="Paypal" height="30">
                            <p class="pt-3">Enter Your Email Or Phone Number for Get Started</p>
                          </div>
                        
                            <div class="form-floating mb-3">
                              <input
                                type="text"
                                class="form-control" name="Label" id="Label" placeholder="Enter Your Email Or Phone Number">
                              <label for="floatingLabel">* Email Or Phone Number</label>
                            </div>
                            <a href="#" class="h-u">Forget Email ?</a>
                            <button class="btn btn-primary p-2 col-12 mt-3">Next</button>
                         
                          <div class="border col-12 mt-5"></div>
                          <div style="position: relative; margin-top: -12px !important; background-color: white; text-align: center; width: 30px; margin: 0 auto;"><span>Or</span></div>
                          <button class="btn btn-secondary col-12 p-2 mt-4" id="debitorcredit">Pay With Debit or Credit Card</button>
                        </div>
                      </div>
                    </div>
                    <hr>
                
            </div>
            
            <div class="col-lg-4 col-md-6 col-12 pt-3 mt-1">
                <div class="pt-5 d-block d-lg-none d-md-block" id="pay"></div>
                <div class="card">
                    <div class="card-header">
                        ORDER SUMMARY
                    </div>

                    @php
                        $total=0;
                        $total_discount=0;
                    @endphp

                    @foreach($cart as $key=>$item)
                        @php
                           $total +=$item['price'] *$item['quantity'];
                           $total_discount +=$item['discount'] *$item['quantity'];
                        @endphp
                    @endforeach
                    <div class="card-body font-m-sm">
                        <div class="d-flex justify-content-between">
                                <p>Subtotal</p>
                                <p>${{$total}}</p>
                        </div>
                        

                        @if($total_discount)
                        <div class="d-flex justify-content-between">
                                <p> Disocunt</p>
                                <p>${{$total_discount}}</p>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between">
                                <p><b>Estimated Total
                                </b></p>
                                <p><b>${{ $total}}</b></p>
                        </div>
                        <p class="font-sm c-cursor cuppon" style="display: inline;">Apply Promo Code <i class="fas fa-chevron-down"></i></p>
                        <div class="form-floating mb-3 cuppon-input" style="display: none;">
                          <input
                            type="text"
                            class="form-control" name="Label" id="Label" placeholder="Appy Cuppon">
                          <label for="floatingLabel">Apply Cuppon</label>
                        </div>
                        <div class="p-2">
                            <hr>
                        </div>
                        <p class="text-center font-sm"><b>YOU QUALIFY FOR COMPLIMENTARY SHIPPING</b></p>
                        <div class="progress" style="height: 15px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="p-2"><hr></div>
                        <button type="submit" class="btn btn-primary col-12 p-1">Pay Now</button>
                    </div>
                </div>
                <div class="p-3"></div>
                <div class="card">
                    <div class="card-header">
                        Your Cart
                    </div>
                    <div class="row pt-2">
                        @forelse($cart as $key=>$item)
                        @php
                           $sub_total=$item['price'] *$item['quantity'];
                           
                        @endphp

                        <div class="col-lg-4 col-md-4 col-4 m-auto">
                            <a href="product.html">
                                <img src="{{ getImage('products',$item['image'])}}" alt="{{$item['name']}}" class="col-12">
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="d-flex justify-content-between">
                                <div class="cart-product-details d-flex justify-content-between col-12">
                                    <div class="cart_details">
                                        <a href="product.html" class="h-u text-dark font-m-sm"><b>{{$item['name']}}</b></a>
                                    </div>
                                    <div class="cart_options d-flex" style="height: 40px;">
                                        <button class="btn" title="Cart Edit">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <button class="btn" title="Add To Wish-list">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                            <p>Cost: <span>${{$item['price']}}</span> * <span>{{$item['quantity']}}</span></p>
                            <p>Total Cost: <span>${{$sub_total}}</span></p>
                        </div>
                        @empty

                        @endforelse


                      </div>
                </div>
                <div class="help font-sm p-2">
                    <b>Need Help? </b> <span><a href="#" class="text-dark">Email,</a><a href="#" class="text-dark">Chat</a></span><span> Or Call 1-888-475-7674</span>
                </div>
            </div>
        </div>
        </form>
        <br>
    </div>
</section>
@endsection

@push('js')
<script src="{{ asset('frontend/js/checkout.js')}}"></script>

@endpush