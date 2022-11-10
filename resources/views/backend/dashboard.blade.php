@extends('backend.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                    <li class="breadcrumb-item active">Detached Sidenav</li>
                </ol>
            </div>
            <h4 class="page-title">Detached Sidenav</h4>
        </div>
    </div>
</div>   
<!-- end page title --> 

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Campaign Sent</h5>
                        <h3 class="my-2 py-1">9,184</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <div id="campaign-sent-chart" data-colors="#3688fc"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">New Leads</h5>
                        <h3 class="my-2 py-1">3,254</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <div id="new-leads-chart" data-colors="#42d29d"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">Deals</h5>
                        <h3 class="my-2 py-1">861</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <div id="deals-chart" data-colors="#3688fc"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="Booked Revenue">Booked Revenue</h5>
                        <h3 class="my-2 py-1">$253k</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <div id="booked-revenue-chart" data-colors="#42d29d"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row">

    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="header-title">Revenue</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                        </div>
                    </div>
                </div>

                <div class="chart-content-bg">
                    <div class="row text-center">
                        <div class="col-sm-6">
                            <p class="text-muted mb-0 mt-3">Current Month</p>
                            <h2 class="fw-normal mb-3">
                                <span>$42,025</span>
                            </h2>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted mb-0 mt-3">Previous Month</p>
                            <h2 class="fw-normal mb-3">
                                <span>$74,651</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div dir="ltr">
                    <div id="dash-revenue-chart" class="apex-charts" data-colors="#42d29d,#44badc"></div>
                </div>

            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row-->



@endsection
                        