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
                <div class="col">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Order Details</h4>

                    </div>
                </div>

            </div>
            <div class="row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">

                <div class="col-md-6">
                    <div class="card">
                        {{-- @dd($orders); --}}
                        <di class="card-header">
                            <h4>OShipping Details</h4>
                            <hr>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tbody>
                                    <tr>
                                        <th width="50%">Shipping Name: </th>
                                        <td>{{ $orders->name }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Shipping Phone: </th>
                                        <td>{{ $orders->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Shipping Email: </th>
                                        <td>{{ $orders->email }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Shipping Address: </th>
                                        <td>{{ $orders->address }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Order Date: </th>
                                        <td>{{ $orders->order_date }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">

                <div class="col-md-6">
                    <div class="card">
                        {{-- @dd($orders); --}}
                        <di class="card-header">
                            <h4>Order Details</h4>
                            <span class="text-danger">Invoice: {{ $orders->invoice_no }}</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tbody>
                                    <tr>
                                        <th width="50%">Name: </th>
                                        <td>{{ $orders->name }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Phone: </th>
                                        <td>{{ $orders->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Email: </th>
                                        <td>{{ $orders->email }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Payment Type: </th>
                                        <td>{{ $orders->payment_type }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Transx Id: </th>
                                        <td>{{ $orders->transaction_id }}</td>
                                    </tr>

                                    <tr>
                                        <th width="50%">Invoice: </th>
                                        <td>{{ $orders->invoice_no }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Order Amount:: </th>
                                        <td>{{ $orders->amount }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Order Status </th>
                                        <td>{{ $orders->order_status }}</td>
                                    </tr>
                                    <tr>
                                        {{-- @dd($orders->status) --}}
                                        <th width="50%"> </th>
                                        <td>
                                            @if ($orders->order_status == 'pending')
                                                <a href="{{route('admin.order.confirm', $orders->id)}}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                            @elseif ($orders->order_status == 'confirm')
                                                <a href="{{route('admin.order.processing', $orders->id)}}" class="btn btn-block btn-success" id="processing">Processing Order</a>
                                            @elseif ($orders->order_status == 'processing')
                                                <a href="{{route('admin.order.deliverd', $orders->id)}}" class="btn btn-block btn-success" id="deliverd">Deliverd Order</a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>


            <div class="row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">

                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <tbody>
                                    <tr>
                                        <td class="col-md-1">
                                            <label for="Image">Image</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="Image">Product Name</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="Image">Restaruant Name</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="Image">Product Code </label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="Image">Quantity</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label for="Image">Size</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="Image">Price</label>
                                        </td>
                                        
                                    </tr>
                                    @foreach ($orderItems as $key => $item)
                                        <tr>
                                            <td class="col-md-1">
                                                <img class="rounded avatar-lg" src="{{asset('upload/products/'.$item->product->image)}}" alt="Card image cap">
                                            </td>
                                            <td class="col-md-1">
                                                {{$item->product->name}}
                                            </td>
                                            <td class="col-md-1">
                                                {{$item->product->client->name}}
                                            </td>
                                            <td class="col-md-1">
                                                {{$item->product->a_code}}
                                            </td>
                                            <td class="col-md-1">
                                                {{$item->quantity}}
                                            </td>
                                            <td class="col-md-1">
                                                {{$item->product->size.' '."CM"}}
                                            </td>
                                            <td class="col-md-3">
                                                {{$item->price}} <br> Total = {{$item->price * $item->quantity}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div>
                                <h3>Totale Price : {{$totalPrice}} Tk</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end col -->
    </div> <!-- end row -->


@endsection
