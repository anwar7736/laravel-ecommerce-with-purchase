@extends('frontend.app')

@section('content')

@php
    $data=getProductInfo($product);
@endphp

<!-- cover start  -->
<section class="mt-5 pt-5">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12">
                <div class="row gallery">
                    @if($product->optional_image)
                    <div class="col-lg-6 col-md-12 col-12">
                        <a class="product-link-zoom" href="{{ getImage('products',$product->optional_image)}}">
                            <img src="{{ getImage('products',$product->optional_image)}}" alt="{{ $product->name}}" class="col-12 c-cursor lightzoom">
                        </a>
                        
                    </div>
                    @endif
                    @if($product->image)
                    <div class="col-lg-6 col-md-12 col-12 d-lg-block d-md-none d-none">
                        <a href="{{ getImage('products',$product->image)}}" class="product-link-zoom">
                          <img src="{{ getImage('products',$product->image)}}" alt="{{ $product->name}}" class="col-12 c-cursor lightzoom">
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-12">
                <form action="{{ route('front.carts.store')}}" method="post" id="cart_form">
                    @csrf
                
                <div class="pt-5 d-block d-lg-none d-md-block"></div>
                <small>{{ $product->category->name}}</small>
                <div class="d-flex justify-content-between align-items-center">
                    <h5>{{ $product->name}}</h5>
                    <button class="btn border-0 ps-3"><h4><i class="fa-regular fa-heart"></i></h4></button>
                </div>
                <small>${{ $data['price']}}</small>
                <hr>
                <p>
                    <small>Chest</small>
                </p>
                <style>
                  .sizebtn{
                    border-radius: 50px;
                    border: 1px solid rgba(128, 128, 128, 0.329);
                  }
                </style>
                @foreach($product->sizes as $s)
                <button type="button" class="sizebtn btn btn-sm" data-id="{{$s->id}}">{{$s->title}}</button>
                @endforeach
                <br>
                <br>
                <p>
                <div class="text-center">
                    <button type="button" class="btn text-muted btn-light" data-bs-toggle="modal" data-bs-target="#sizechart"><i class="fa fa-ruler-horizontal"></i> Size Chart</button>

                    <div class="modal fade" id="sizechart" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">Size Chart</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('frontend/img/SIZECHART_cms.webp')}}" alt="" class="col-12">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Optional: Place to the bottom of scripts -->
                    
                </div>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <br>
                <button type="submit" class="add-cart text-center col-12 btn btn-primary">Add to Cart</button>
                </form>
            </div>
            <style>
                .display{
                    display: none !important;
                }
            </style>
            <div class="col-lg-7 col-md-6 col-12 pt-5">
                <div class="tags text-center">
                    <button class="btn" id="product-discription">DISCRIPTION</button>
                    <button class="btn" id="product-details">DETAILS</button>
                    <button class="btn" id="product-shipping">SHIPPING & FREE RETURN</button>
                </div>
                <div class="tag-details col-12 pt-2">
                    <hr>
                    <div id="discription-box" class="discription-box col-12">
                        <div class="p-3 text-center font-m-sm">
                            <small>
                                {{ $product->description}}
                            </small>

                        </div>
                    </div>
                    <div id="details-box" class="details-box col-12 display">
                        <div class="p-3 font-m-sm">
                            <small>
                                <ul class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        {!! $product->body !!}
                                    </div>

                                </ul>
                            </small>

                        </div>
                    </div>
                    <div id="product-shipping-box" class="details-box col-12 display">
                        <div class="p-3 font-m-sm text-center">
                            <p class="p-2 "><b>
                                Free Fast Shipping With a Ralph Lauren Account
                            </b></p>
                            <p class="p-2"><b>
                                Receive by Friday, September 09, if you order by 3 PM ET and select Fast shipping at checkout.
                            </b></p>
                            <a href="#" class="text-dark"><b>Free Returns & Exchanges</b></a>
                            <div class="font-sm pb-3 pt-2">
                                Enjoy free returns and exchanges within 30 days of the order shipment date. Personalized items and gift boxes cannot be returned.
                            </div>
                            <a href="#" class="text-dark"><b>Shipping & Pickup</b></a>
                            <div class="font-sm pb-3 pt-2">
                                Enjoy free returns and exchanges within 30 days of the order shipment date. Personalized items and gift boxes cannot be returned.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="recomended">
            <h3 class="serif pb-2 pt-2">Recomended for you</h3>
            <div class="row col-12">

                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 product-div">
                    <a href="{{ route('front.products.show',[$product->id])}}" class="s-product">
                    <img src="{{ getImage('products',$product->image)}}" alt="Product" class="col-12 pb-4">
                    <span>{{ $product->name}}</span>​</a>
                </div>
                @endforeach
                  
            </div>
        </div>
    </div>
</section>
<!-- cover end  -->
<!-- recently veiw section  -->
<section class="mt-5 pt-5">
  <div class="container">
        <x-recent-view-product/>
  </div>
</section>
<!-- recently veiw section  -->
    
@endsection
@push('js')


@endpush