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
    </div>
</div>   
<!-- end page title --> 

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4> Category Create</h4>
            </div>
            <div class="card-body">
   
            @can('category.create')
                <form method="POST" action="{{ route('admin.categories.store')}}" id="ajax_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="mb-3">
                                <label  class="form-label">Type</label>
                                
                                <select class="form-control" name="type_id">
                                    <option value="" hidden>Select One ..</option>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id}}">{{ $type->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label  class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Category Name">
                            </div>

                            <div class="mb-3">
                                <label  class="form-label">Category Image</label>
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
                                <th>Category Type</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key=> $item)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$item->type?$item->type->name :''}} </td>
                                <td> {{$item->name}} </td>
                                <td>
                                    <img src="{{ getImage('categories', $item->image)}}" width="150"> 
                                </td>
                                <td>
                                @can('category.edit')
                                    <a href="{{ route('admin.categories.edit',[$item->id])}}" class="action-icon btn_modal"> 
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                @endcan
                                @can('category.delete')
                                    <a href="{{ route('admin.categories.destroy',[$item->id])}}" class="delete action-icon"> <i class="mdi mdi-delete"></i></a>
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