@extends('backend.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                    <li class="breadcrumb-item active">Order List</li>
                </ol>
            </div>
            <h4 class="page-title">Order List</h4>
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
                        <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <label for="status-select" class="me-2">Status</label>
                                    <select class="form-select" id="status-select">
                                        <option selected>Choose...</option>
                                        <option value="1">Paid</option>
                                        <option value="2">Awaiting Authorization</option>
                                        <option value="3">Payment failed</option>
                                        <option value="4">Cash On Delivery</option>
                                        <option value="5">Fulfilled</option>
                                        <option value="6">Unfulfilled</option>
                                    </select>
                                </div>
                            </div>
                        </form>                            
                    </div>
                    <div class="col-xl-4">
                        <div class="text-xl-end mt-xl-0 mt-2">
                        @can('order.create')
                            <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                        @endcan
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Customers</th>
                                <th>Item</th>
                                <th>Amount</th>
                                <th>Discount</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Date Order</th>
                                <th>Order Status</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold">#{{$item->invoice_no}}</a> </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ getImage()}}" class="rounded-circle avatar-xs" alt="friend">
                                            </div>
                                            <div class="flex-grow-1 ms-2"><h5 class="my-0"> {{$item->user->name}} </h5></div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$item->details->count()}}</td>
                                <td>{{$item->final_amount}}</td>
                                <td>{{$item->discount}}</td>

                                <td>{{$item->shipping_address}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>{{ dateFormate($item->date)}}</td>
                                <td><h5 class="my-0"><span class="badge badge-info-lighten">{{$item->status}}</span></h5></td>
                                <td>
                                    <a href="{{ route('admin.orders.show',[$item->id])}}" class="action-icon"> <i class="mdi mdi-details"></i></a>
                                    @can('order.delete')
                                    <a href="{{ route('admin.orders.destroy',[$item->id])}}" class="delete action-icon"> <i class="mdi mdi-delete"></i></a>
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