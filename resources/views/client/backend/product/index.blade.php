@extends('client.client_dashboard')
@section('client')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Products</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <a href="{{route('client.product.add')}}" class="btn btn-primary waves-effect waves-light">Add Product</a>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Menu</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{(!empty($item->image))?url('upload/products/'.$item->image):url('upload/no_image.jpg')}}" height="30" width="30" alt=""></td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @foreach ($menus as $menu)
                                            @if ($item->menu_id == $menu->id)
                                                {{$menu->menu_name}}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->discount_price}}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('client.menu.edit', $item->id)}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{route('client.menu.delete', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
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
