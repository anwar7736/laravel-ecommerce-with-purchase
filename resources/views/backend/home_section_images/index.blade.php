@extends('backend.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                    <li class="breadcrumb-item active">Home Section Image Manage</li>
                </ol>
            </div>
            <h4 class="page-title">Home Section Image Manage</h4>
        </div>
    </div>
</div>   
<!-- end page title --> 

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4> Home Section Image Create</h4>
            </div>
            <div class="card-body">
   
            @can('image.create')
                <form method="POST" action="{{ route('admin.home_section_images.store')}}" id="ajax_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">

                            
                            <div class="mb-3">
                                <label  class="form-label">Home Section Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Home Section title">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">Home Section Text</label>
                                <input type="text" name="text" class="form-control" placeholder="Home Section Text">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">Home Section Number</label>
                                <input type="number" name="section" class="form-control" placeholder="Home Section section">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">Home Section Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
                @endcan
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
   

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>SL</th>
                                <th>Home Image Title</th>
                                <th>Home Image Section</th>
                                <th>Home Image Image</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key=> $item)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$item->title}} </td>
                                <td> {{$item->section}} </td>
                                <td>
                                    <img src="{{ getImage('homeimages', $item->image)}}" width="150"> 
                                </td>
                                <td>
                                @can('image.edit')
                                    <a href="{{ route('admin.home_section_images.edit',[$item->id])}}" class="action-icon btn_modal"> 
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                @endcan
                                @can('image.delete')
                                    <a href="{{ route('admin.home_section_images.destroy',[$item->id])}}" class="delete action-icon"> <i class="mdi mdi-delete"></i></a>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection 