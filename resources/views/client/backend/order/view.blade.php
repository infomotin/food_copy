@extends('client.client_dashboard')
@section('client')
    <div class="page-content">
        <div class="container-fluid">
            {{-- @dd($orderItems,$oderData,$totalPrice) --}}
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Order Details</h4>

                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shipping Details</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered border-primary">

                                    <tbody>
                                        <tr>
                                            <th width="50%">Shipping Name: </th>
                                            <td>{{ $oderData->first_name . ' ' . $oderData->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Shipping Phone: </th>
                                            <td>{{ $oderData->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Shipping Email: </th>
                                            <td>{{ $oderData->email }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Shipping Address: </th>
                                            <td>{{ $oderData->address }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Order Date: </th>
                                            <td>{{ $oderData->order_date }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->


                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details
                                <span class="text-danger">Invoice: {{ $oderData->invoice_no }}</span>
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered border-primary">

                                    <tbody>
                                        <tr>
                                            <th width="50%"> Name: </th>
                                            <td>{{ $oderData->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%"> Phone: </th>
                                            <td>{{ $oderData->user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%"> Email: </th>
                                            <td>{{ $oderData->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Payment Type: </th>
                                            <td>{{ $oderData->payment_method }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Transx Id: </th>
                                            <td>{{ $oderData->transaction_id }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Invoice: </th>
                                            <td class="text-danger">{{ $oderData->invoice_no }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Order Amount: </th>
                                            <td>${{ $oderData->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Order Status: </th>
                                            <td><span class="badge bg-success">{{ $oderData->order_status }}</span></td>
                                        </tr>
                                        <tr>
                                            {{-- @dd($orders->status) --}}
                                        <th width="50%">Update Order Flow </th>
                                        <td>
                                            @if ($oderData->order_status == 'pending')
                                                <a href="{{route('client.order.confirm', $oderData->id)}}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                            @elseif ($oderData->order_status == 'confirm')
                                                <a href="{{route('client.order.processing', $oderData->id)}}" class="btn btn-block btn-success" id="processing">Processing Order</a>
                                            @elseif ($oderData->order_status == 'processing')
                                                <a href="{{route('client.order.deliverd', $oderData->id)}}" class="btn btn-block btn-success" id="deliverd">Deliverd Order</a>
                                            @endif
                                        </td>
                                           
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->


            </div> <!-- end row -->



            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                <div class="col">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="col-md-1">
                                            <label>Image</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Product Name</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Restruatnt Name </label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Product Code</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Quantity</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Price</label>
                                        </td>
                                    </tr>
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td class="col-md-1">
                                                <label>
                                                    <img src="{{asset('upload/products/'.$item->product->image)}}"
                                                        style="width:50px; height:50px">
                                                </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>
                                                    {{ $item->product->name }}
                                                </label>
                                            </td>
                                            @if ($item->client_id == null)
                                                <td class="col-md-2">
                                                    <label>
                                                        Owner
                                                    </label>
                                                </td>
                                            @else
                                                <td class="col-md-2">
                                                    <label>
                                                        {{ $item->product->client->name }}
                                                    </label>
                                                </td>
                                            @endif
                                            <td class="col-md-2">
                                                <label>
                                                    {{ $item->product->a_code }}
                                                </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>
                                                    {{ $item->qty }}
                                                </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>
                                                    {{-- @dd($item) --}}
                                                    {{ $item->price }} <br> Total = $ {{ $item->price * $item->quantity }}
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <h4>Total Price: $ {{ $totalPrice }}</h4>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
