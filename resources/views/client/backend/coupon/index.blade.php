@extends('client.client_dashboard')
@section('client')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Coupon</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <a href="{{route('client.coupon.add')}}" class="btn btn-primary waves-effect waves-light">Add Coupon</a>
                        </ol>
                    </div>

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
                                    <th>SL</th>
                                    <th>Coupon Name</th>
                                    <th>Coupon Desc</th>
                                    <th>Coupon discunt</th>
                                    <th>Coupon Validity</th>
                                    <th>Coupon Validity</th>
                                    <th>Coupon Status</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->coupon_name}}</td>
                                    <td>{{Str::limit($item->coupon_description, 20, '...')}}</td>
                                    <td>{{$item->coupon_discount}}</td>
                                    <td>{{Carbon\Carbon::parse($item->coupon_validity)->format('D, d M Y')}}</td>
                                    <td>
                                        @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Expired</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->coupon_status == 1)
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        @elseif($item->coupon_status == 2)
                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                        @elseif($item->coupon_status == 3)
                                            <span class="badge rounded-pill bg-danger">Deactive</span>
                                        @else
                                            <span class="badge rounded-pill bg-secondary">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('client.coupon.edit', $item->id)}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{route('client.coupon.delete', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
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
