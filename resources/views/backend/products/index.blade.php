@extends('backend.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </div>
            <h4 class="page-title">Product List</h4>
        </div>
    </div>
</div>   
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-xl-8">
                                                  
                    </div>
                    <div class="col-xl-4">
                        <div class="text-xl-end mt-xl-0 mt-2">
                        @can('product.create')
                            <a href="{{ route('admin.products.create')}}" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Product</a>
                        @endcan
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                
                                <th>Product</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Purchase Price</th>
                                <th>Sell Price</th>
                                <th>description</th>
                                <th>Stock</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                        
                                    <div class="flex-shrink-0">
                                        <img src="{{ getImage('products',$item->image)}}" class="rounded-circle avatar-xs" alt="friend">
                                    </div>
                                        
                                </td>
                                <td>{{ $item->category?$item->category->name:''}}</td>
                                
                                <td>{{$item->purchase_price}}</td>
                                <td>{{$item->sell_price}}</td>
                                <td>{{ Str::limit($item->description, 60) }}</td>
                                <td>{{ $item->stocks->sum('quantity')}}</td>
                                <td>
                                    <a href="{{ route('admin.products.show',[$item->id])}}" class="action-icon"> <i class="mdi mdi-details"></i></a>
                                    @can('product.edit')
                                    <a href="{{ route('admin.products.edit',[$item->id])}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @endcan
                                    @can('product.delete')
                                    <a href="{{ route('admin.products.destroy',[$item->id])}}" class="delete action-icon"> <i class="mdi mdi-delete"></i></a>
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