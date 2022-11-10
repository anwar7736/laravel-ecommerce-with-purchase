@extends('frontend.app')
@section('content')
    
    <section id="banner" class="p-0 m-0">
      <div id="coversection" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#coversection" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#coversection" data-bs-slide-to="1"></li>
          <li data-bs-target="#coversection" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner header-carousel" data-aos="fade-up"
        data-aos-duration="500">

          @foreach($sliders as $key=>$sl)
          <div class="carousel-item {{ $key==0?'active':''}}">
            <img src="{{ getImage('sliders', $sl->image)}}" class="d-none d-lg-block d-md-block w-100" alt="Product">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{$sl->title}}</h5>
              <p>{{$sl->description}}</p>
            </div>
          </div>
          @endforeach

   
        </div>
        <a class="carousel-control-prev" href="#coversection" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-left"></i></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#coversection" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-right"></i></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
      
    </section>

    @if($images->where('section',1))

    @foreach($images->where('section',1) as $img)
    <section id="handbag-section" 
    style="background-image: url({{ getImage('homeimages',$img->image)}});
    background-position: bottom;
    background-size: cover;
    padding-bottom: 30px;"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-6 col-12 handbag-left m-auto" data-aos="fade-up">
            <a href="#">
              <!-- <img src="{{ asset('frontend/img/0816_hp_c02a_img.jpg')}}" alt="Image" class="col-10"> -->
              <div class="video-block">
                <video class=" col-12 col-lg-9 m-auto text-center" autoplay muted loop id="myVideo">
                  <source src="{{ asset('frontend/video/Hero_MOB.mp4')}}" type="video/mp4">
                  Your browser does not support HTML5 video.
                </video>
              </div>
            </a>
              <h2 class="serif p-0 m-0">{{ $img->title}}</h2>
              <span class="serif"> {{$img->text}} </span>
              <br>
            <a href="{{ route('front.products.index')}}" class="u-botton text-light border-light">Shop Now</a>
            </div>
          <div class="col-lg-5 col-md-6 col-12 handbag-right" data-aos="fade-down" data-aos-duration="500">
            <h2 class="text-center serif">Polo ID Handbags</h2>
            <div id="handbagsection" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#handbagsection" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#handbagsection" data-bs-slide-to="1"></li>
                <li data-bs-target="#handbagsection" data-bs-slide-to="2"></li>
                <li data-bs-target="#handbagsection" data-bs-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">

                @foreach($cats as $key=>$cat)
                <div class="carousel-item {{ $key==0 ?'active':''}}">
                  <a href="#" class="a-herf">
                    <img src="{{ getImage('categories', $cat->image)}}" class="d-block w-100" alt="slider Image ">
                    <div class="carousel-caption d-none d-md-block">
                      <h1 class="serif text-light">{{ $cat->name}}</h1>
                      <span class="u-botton text-light border-light">EXPLORE NOW</span>
                    </div>
                  </a>
                </div>
                @endforeach
               
              </div>
              <a class="carousel-control-prev" href="#handbagsection" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-left"></i></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#handbagsection" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endforeach
    @endif

    <!-- Header end  -->
    <!-- shop banner section start  -->
    @if($images->where('section',2))

    @foreach($images->where('section',2) as $img)
    <section class="mt-5">
      <div class="container text-center m-auto" data-aos="">
        <a href="category.html" class="text-dark a-herf">
          <img src="{{ getImage('homeimages',$img->image)}}" alt="product Picture" class="col-12 container">
        <div class=" text-center">
          <h3 class="text-dark pt-5" style="letter-spacing: 3px;">{{$img->title}}</h3>
          <p class="font-sm">
            {{$img->text}}
          </p>

        </div>
        </a>
        <a href="{{ route('front.products.index')}}" class="u-botton-dark text-dark text-center">SHOP NOW</a>
      </div>
    </section>
    @endforeach
    @endif
    <!-- shop banner section end  -->

    <!-- for you section -->

    @if($recent_products->count())
    <section class="mt-5 mb-5">
      <div class="container">
        <div class="tab mt-4">
          <div class="d-flex">
            <div id="foryou" class="pt-1 btn border-0 border-top-0 border-end-0 border-start-0 border border-dark serif " style="color: black;"><h4>For you</h4></div>
            <div id="wishlist" class="btn border-0 serif ps-2" style="color: gray;"><h4>Wishlist</h4></div>
          </div>


        <div class="category-grid foryou" style="display: block;">
          <div class="row owl-carousel foryou-inner">

            @foreach($recent_products as $product)
            <div class="product-div">
              <a href="{{ route('front.products.show',[$product->id])}}" class="s-product">
              <img src="{{ getImage('products',$product->image)}}" alt="Product" class="col-12 pb-4">
              <span>{{ $product->name}}</span></a>
            </div>
            @endforeach
            
        </div>

        <div class="category-grid wishlist" style="display: none;">
          <div class="owl-carousel wishlist-inner">
            <div class="product-div h-100">
              <div class="s-product text-center wishlist-item-first p-5">
                <h3>Wishlist</h3>
                <h3><i class="fa-regular fa-heart"></i></h3>
              </div>
            </div>
            <div class="product-div">
              <a href="category.html" class="s-product">
              <img src="{{ asset('frontend/img/pic1.jpg')}}" alt="Product" class="col-12 pb-4">
              <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
            </div>
            <div class="product-div">
              <a href="category.html" class="s-product">
              <img src="{{ asset('frontend/img/pic1.jpg')}}" alt="Product" class="col-12 pb-4">
              <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
            </div>
            <div class="product-div">
              <a href="category.html" class="s-product">
              <img src="{{ asset('frontend/img/pic1.jpg')}}" alt="Product" class="col-12 pb-4">
              <span>CASUAL SHIRTS & DRESS SHIRTS</span>​</a>
            </div>
          </div>
        </div>
      </div>

    </section>
    @endif
    <!-- for you section -->
    <!-- banner section start  -->
    @if($images->where('section',3))

    @foreach($images->where('section',3) as $img)
    <section>
      <div class="" style="overflow: hidden;">
        <img src="{{ getImage('homeimages',$img->image)}}" alt="banner" class="col-12 d-lg-block d-md-block d-none" style="height: 100vh;">
        <img src="{{ getImage('homeimages',$img->image)}}" alt="banner" class="col-12 d-lg-none d-md-none d-block" style="height: 100vh;">
        <div class="banner-text-cover text-center text-light">
          <h1 class="serif font-xl" style="letter-spacing: 3px;">{{ $img->title}}</h1>
          <h5 class="serif">{{ $img->text}}</h5>
          <a href="{{ route('front.products.index')}}" class="u-botton">SHOP NOW</a>
        </div>
      </div>
    </section>
    @endforeach
    @endif
    <!-- banner section end  -->
    <!-- Category section start  -->
    <section class="mt-5 mb-5">
      <div class="container text-center">
        <img src="{{ asset('frontend/img/2018_polo_black_logo.svg')}}" alt="Logo" class="col-lg-2 col-md-4 col-6">
        <div class="row pt-5">
          <div class="row owl-carousel cat-5">
            @foreach($types as $type)
            <div class="text-center pb-3">
              <a href="{{ route('front.products.index')}}?type_id={{$type->id}}" class="text-dark a-herf">
                <img src="{{ getImage('types',$type->image)}}" alt="Product" class="col-12 pb-3">
              </a>
              <span class="p-0 font-m-sm">{{ $type->name}}</span><br>
              <a href="{{ route('front.products.index')}}?type_id={{$type->id}}" class="text-dark font-sm u-botton-dark">EXPLORE NOW</a>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>
    <!-- Category section end  -->
@endsection