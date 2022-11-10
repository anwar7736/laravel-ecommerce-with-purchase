@extends('backend.app')
@section('content')    
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                    <li class="breadcrumb-item active">Category Manage</li>
                </ol>
            </div>
            <h4 class="page-title">Category Manage</h4>
        </div>
        @if(Session::has('success'))
         <div class="alert alert-success">
            {{Session::get('success')}}
         </div>
        @endif
    </div>
</div>   
<!-- end page title --> 
<form action="{{ route('admin.career.store') }}" id="careerForm" method="POST" enctype="multipart/form-data">
    @csrf
<div class="main-wrapper container-fluid card">
  <div class="main-wrapper">
    <link rel="stylesheet" href="frontend/css/career.css">        

    <section>
        
        <div class="career-banner" style="background-image: url({{asset('frontend/img/updated/'.$career_info->cover_image)}});">
        <input type="file" name="cover_image" id="cover_image">
            <input type="text" class="title form-control" name="cover_image_caption" value="{{$career_info->cover_image_caption}}">
        </div>
        <div class="form-group">

        </div>
    </section>
    <br><br>
    <section>
        <div class="container mt-5">
            <div class="career mb-5">
            <div class="row career-row mb-5">
                    <div class="col-lg-4 col-md-4 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_one)}}" alt="">
                        <input type="file" name="career_img_one" id="career_img_one"><br><br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 m-auto ps-5 align-items-start career-item">
                        <input type="text" class="text-cap mb-5 form-control" name="career_one_title" value="{{$career_info->career_one_title}}">
                        <textarea class="form-control" name="career_one_desc" rows="10">{{$career_info->career_one_desc}}</textarea>
                    </div>
                </div>
                <div class="row career-row mb-5">
                    <div class="col-lg-4 col-md-4 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_two)}}" alt="">
                        <input type="file" name="career_img_two" id="career_img_two"><br><br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 m-auto ps-5 align-items-start career-item">
                        <input type="text" class="text-cap mb-5 form-control" name="career_two_title" value="{{$career_info->career_two_title}}">
                        <textarea class="form-control" name="career_two_desc" rows="10">{{$career_info->career_two_desc}}</textarea>
                    </div>
                </div><div class="row career-row mb-5">
                    <div class="col-lg-4 col-md-4 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_three)}}" alt="">
                        <input type="file" name="career_img_three" id="career_img_three"><br><br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 m-auto ps-5 align-items-start career-item">
                        <input type="text" class="text-cap mb-5 form-control" name="career_three_title" value="{{$career_info->career_three_title}}">
                        <textarea class="form-control" name="career_three_desc" rows="10">{{$career_info->career_three_desc}}</textarea>
                    </div>
                </div><div class="row career-row mb-5">
                    <div class="col-lg-4 col-md-4 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_four)}}" alt="">
                        <input type="file" name="career_img_four" id="career_img_four"><br><br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 m-auto ps-5 align-items-start career-item">
                        <input type="text" class="text-cap mb-5 form-control" name="career_four_title" value="{{$career_info->career_four_title}}">
                        <textarea class="form-control" name="career_four_desc" rows="10">{{$career_info->career_four_desc}}</textarea>
                    </div>
                </div><div class="row career-row mb-5">
                    <div class="col-lg-4 col-md-4 col-12 m-auto career-item">
                        <img src="{{asset('frontend/img/updated/'.$career_info->career_img_five)}}" alt="">
                        <input type="file" name="career_img_five" id="career_img_five"><br><br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 m-auto ps-5 align-items-start career-item">
                        <input type="text" class="text-cap mb-5 form-control" name="career_five_title" value="{{$career_info->career_five_title}}">
                        <textarea class="form-control" name="career_five_desc" rows="10">{{$career_info->career_five_desc}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <button class="btn btn-success mb-2" type="submit">Update Content</button>
    </section>
  </div>
  </form>
  @endsection

