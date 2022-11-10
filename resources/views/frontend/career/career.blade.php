@extends('frontend.app')
@section('content')
@php 
    $career_info = DB::table('careers')->first();
@endphp
<div class="main-wrapper container-fluid">
  <div class="main-wrapper">
    <link rel="stylesheet" href="frontend/css/career.css">
    <section>
        <div class="career-banner" style="background-image: url({{asset('frontend/img/updated/'.$career_info->cover_image)}});">
            <h2 class="title">{{$career_info->cover_image_caption}}</h2>
        </div>
    </section>
    <br><br>
    <section>
        <div class="container mt-5">
            <div class="career mb-5">
            <div class="row career-row mb-5">
                    <div class="col-lg-5 col-md-5 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_one)}}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 m-auto ps-5 align-items-start career-item">
                        <h2 class="text-cap mb-5">
                            {{$career_info->career_one_title}}
                        </h2>
                        <p>{{$career_info->career_one_desc}}</p>
                    </div>
                </div>
                <div class="row career-row mb-5">
                    <div class="col-lg-5 col-md-5 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_two)}}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 m-auto ps-5 align-items-start career-item">
                        <h2 class="text-cap mb-5">
                            {{$career_info->career_two_title}}
                        </h2>
                        <p>{{$career_info->career_two_desc}}</p>
                    </div>
                </div><div class="row career-row mb-5">
                    <div class="col-lg-5 col-md-5 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_three)}}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 m-auto ps-5 align-items-start career-item">
                        <h2 class="text-cap mb-5">
                            {{$career_info->career_three_title}}
                        </h2>
                        <p>{{$career_info->career_three_desc}}</p>
                    </div>
                </div><div class="row career-row mb-5">
                    <div class="col-lg-5 col-md-5 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_four)}}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 m-auto ps-5 align-items-start career-item">
                        <h2 class="text-cap mb-5">
                            {{$career_info->career_four_title}}
                        </h2>
                        <p>{{$career_info->career_four_desc}}</p>
                    </div>
                </div><div class="row career-row mb-5">
                    <div class="col-lg-5 col-md-5 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_five)}}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 m-auto ps-5 align-items-start career-item">
                        <h2 class="text-cap mb-5">
                            {{$career_info->career_five_title}}
                        </h2>
                        <p>{{$career_info->career_five_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </section>
  </div>
  @endsection