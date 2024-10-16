@extends('client.client_dashboard')
@section('client')
    <div class="page-content">
        <div class="container-fluid">
            @php
                $id = Auth::guard('client')->id();
                $client = App\Models\Client::find($id);
                $status = $client->status;
            @endphp
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if ($status === 'active')
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="mb-3 text-muted lh-1 d-block text-truncate">My Wallet</span>
                                        <h4 class="mb-3">
                                            $<span class="counter-value" data-target="865.2">0</span>k
                                        </h4>
                                    </div>

                                    <div class="col-6">
                                        <div id="mini-chart1" data-colors='["#5156be"]' class="mb-2 apex-charts"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+$20.9k</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="mb-3 text-muted lh-1 d-block text-truncate">Number of Trades</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="6258">0</span>
                                        </h4>
                                    </div>
                                    <div class="col-6">
                                        <div id="mini-chart2" data-colors='["#5156be"]' class="mb-2 apex-charts"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-danger-subtle text-danger">-29 Trades</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="mb-3 text-muted lh-1 d-block text-truncate">Invested Amount</span>
                                        <h4 class="mb-3">
                                            $<span class="counter-value" data-target="4.32">0</span>M
                                        </h4>
                                    </div>
                                    <div class="col-6">
                                        <div id="mini-chart3" data-colors='["#5156be"]' class="mb-2 apex-charts"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+ $2.8k</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="mb-3 text-muted lh-1 d-block text-truncate">Profit Ration</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="12.57">0</span>%
                                        </h4>
                                    </div>
                                    <div class="col-6">
                                        <div id="mini-chart4" data-colors='["#5156be"]' class="mb-2 apex-charts"></div>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+2.95%</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>
            @else
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible alert-solid" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div class="alert-message">
                                        <div class="alert-message-text">
                                            <strong>Account Deactivated</strong>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- end row-->




        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
