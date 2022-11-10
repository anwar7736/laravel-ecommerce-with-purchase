@extends('frontend.app')
@section('content')
@php 
    $about_info = DB::table('about_us')->first();
@endphp
<div class="main-wrapper container-fluid">
  <div class="main-wrapper">
    <section>
        <link rel="stylesheet" href="frontend/css/about.css">
          <div class="about-banner col-12">
            <div class="about-banner-item">
              <div class="about-banner-text text-center text-light">
                <h2>{{$about_info->page_title}}</h2>
                <p>{{$about_info->sub_title}}</p>
              </div>
              <img src="{{$about_info->cover_image}}" alt="Image" class="d-none d-md-none d-lg-block">
              <img src="{{$about_info->cover_image}}" alt="Image" class="d-block d-md-block d-lg-none">
              
            </div>
          </div>

          <div class="container mt-5">
            <div class="quate-signature">
              <div class="quate col-lg-6 col-md-8 col-12 m-auto">
                  {{$about_info->speech}}
              </div>
              <div class="signature text-center">
                <img src="{{$about_info->signature}}" alt="signature" height="60">
              </div>
            </div>
          </div>

      </section>

      <section>
        <div class="container about-us text-center mt-5">
          <h2 class="title">{{$about_info->page_title}}</h2>
          <p class="dec">
            {{$about_info->page_desc}}
          </p>
        </div>
      </section>

      <section>
        <div class="container fade-slider-about mt-5 pt-5">
          <div id="about-slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{$about_info->slider_img_one}}" class="d-block w-100" alt="image">
                <div class="carousel-caption">
                  <p>{{$about_info->slider_caption_one}}</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{$about_info->slider_img_two}}" class="d-block w-100" alt="image">
                <div class="carousel-caption">
                  <p>{{$about_info->slider_caption_two}}</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{$about_info->slider_img_three}}" class="d-block w-100" alt="img">
                <div class="carousel-caption">
                  <p>{{$about_info->slider_caption_three}}</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#about-slider" data-bs-slide="prev">
              <i class="fa-solid fa-circle-chevron-left"></i>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#about-slider" data-bs-slide="next">
              <i class="fa-solid fa-circle-chevron-right"></i>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <div class="button text-center mt-5 mb-5">
            <a href="/" class="btn">Fabby Stitch</a>
          </div>
        </div>
      </section>

      <section>
        <div class="container mt-5 our-culture">
          <h2 class="title">{{$about_info->title_one}}</h2>
          <div class="container dec text-center mt-5">
            {{$about_info->desc_one}}
          </div>
        </div>
      </section>
      <section>
        <div class="container mt-5 our-culture">
          <h2 class="title">{{$about_info->title_two}}</h2>
          <div class="container dec text-center mt-5">
            {{$about_info->desc_two}}
          </div>
        </div>


      </section>
      <section>
        <div class="container mt-5 pt-5">
          <div class="col-lg-8 col-md-11 col-12 m-auto">
            <div class="about-us-video text-center">
              {!!$about_info->video!!}
            </div>
          </div>
        </div>
      </section>
  </div>
  @endsection
  