@extends('backend.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                    <li class="breadcrumb-item active">Order Details</li>
                </ol>
            </div>
            <h4 class="page-title">Order Details</h4>
        </div>
    </div>
</div>   
<!-- end page title --> 

<div class="row justify-content-center">
    <div class="col-lg-7 col-md-10 col-sm-11">

        <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
            <div class="horizontal-steps-content">
                <div class="step-item">
                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $item->created_at}}">Order Placed</span>
                </div>
                <div class="step-item current">
                    <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="21/08/2018 11:32 AM">Packed</span>
                </div>
                <div class="step-item">
                    <span>Shipped</span>
                </div>
                <div class="step-item">
                    <span>Delivered</span>
                </div>
            </div>

            <div class="process-line" style="width: 33%;"></div>
        </div>
    </div>
</div>
<!-- end row -->    


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Items from Order #{{$item->invoice_no}}</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>Item</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($item->details as $product)
                            <tr>
                                <td>{{ $product->product->name}}</td>
                                <td>{{ $product->size}}</td>
                                <td>{{ $product->quantity}}</td>
                                <td>${{ $product->unit_price}}</td>
                                <td>${{ $product->quantity* $product->unit_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Order Summary</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Grand Total :</td>
                            <td>${{ $item->amount}}</td>
                        </tr>
                        <tr>
                            <td>Shipping Charge :</td>
                            <td>${{ $item->shipping_charge}}</td>
                        </tr>
                        <tr>
                            <td>Estimated Tax : </td>
                            <td>${{ $item->tax}}</td>
                        </tr>

                        @if($item->discount)
                        <tr>
                            <td>Estimated Tax : </td>
                            <td>${{ $item->discount}}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>Total :</th>
                            <th>${{ $item->final_amount}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->

            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Shipping Information</h4>

                <h5>{{ $item->first_name}} {{ $item->last_name}}</h5>
                
                <address class="mb-0 font-14 address-lg">
                    {{ $item->shipping_address}}<br>
                    <abbr title="Phone">P:</abbr> {{ $item->mobile}} <br/>
                </address>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Billing Information</h4>

                <ul class="list-unstyled mb-0">
                    <li>
                        <p class="mb-2"><span class="fw-bold me-2">Payment Type:</span> Credit Card</p>
                        <p class="mb-2"><span class="fw-bold me-2">Provider:</span> Visa ending in 2851</p>
                        <p class="mb-2"><span class="fw-bold me-2">Valid Date:</span> 02/2020</p>
                        <p class="mb-0"><span class="fw-bold me-2">CVV:</span> xxx</p>
                    </li>
                </ul>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Delivery Info</h4>

                <div class="text-center">
                    <i class="mdi mdi-truck-fast h2 text-muted"></i>
                    <h5><b>UPS Delivery</b></h5>
                    <p class="mb-1"><b>Order ID :</b> xxxx235</p>
                    <p class="mb-0"><b>Payment Mode :</b> COD</p>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection 