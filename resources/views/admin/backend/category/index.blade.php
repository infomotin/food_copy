@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Category</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <a href="{{route('admin.category.add')}}" class="btn btn-primary waves-effect waves-light">Add Category</a>
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
                                    <th>CAtegory Name</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userData as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->category_name}}</td>
                                    <td><img src="{{(!empty($item->image))?url('upload/category/'.$item->image):url('upload/no_image.jpg')}}" height="50" width="50" alt=""></td>
                                    <td>
                                        <a href="{{route('admin.category.edit', $item->id)}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{route('admin.category.delete', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

@endsection
