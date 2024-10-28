@extends('admin.admin_dashboard')
@section('admin')
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
                    <h4 class="mb-sm-0 font-size-18">ALl Order </h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <a href="#"
                                class="btn btn-primary waves-effect waves-light">Submite Order </a>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- @dd($orders); --}}
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Inv</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Qty</th>
                                    <td>Method</td>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->order_date}}</td>
                                    <td>{{$item->invoice_no}}</td>
                                    <td>{{$item->currency}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->payment_status}}</td>
                                    <td>{{$item->order_quantity}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    </td>{{$item->status}}</td>
                                    <td>
                                        <span class="badge badge-soft-success">{{$item->payment_status}}</span>
                                    </td>

                                    <td>
                                        <a href="{{route('admin.order.details', $item->id)}}" class="btn btn-info sm"
                                            title="Edit Data"> <i class="fas fa-eye"></i> </a>
                                        <a href="#"
                                            class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                class="fas fa-trash-alt"></i> </a>


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
