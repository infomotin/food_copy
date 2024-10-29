@extends('client.client_dashboard')
@section('client')
    {{-- load jquare cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{-- load toggle cdn --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Order List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Show </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $key => $Orderitem)
                                        @php
                                            $firstItems = $Orderitem->first();
                                            $order = $firstItems->order;
                                        @endphp
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->order_date }}</td>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->order_status }}</td>
                                            <td>
                                                <a href="{{ route('client.order.view', $order->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('client.order.reject', $order->id) }}" class="btn btn-danger sm" title="Delete Data"
                                                    id="reject"> <i class="fas fa-trash-alt"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    
@endsection
