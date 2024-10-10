@extends('client.client_dashboard')
@section('client')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Photo Gallery</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <a href="{{route('client.gallery.add')}}" class="btn btn-primary waves-effect waves-light">Add Photo</a>
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
                                    <th>Photos</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{!empty($item->gallery_image) ? url('upload/gallerys/'.$item->gallery_image) : url('upload/no_image.png')}}" style="width: 70px; height: 50px;" alt=""></td>
                                    <td>
                                        <a href="{{route('client.gallery.edit', $item->id)}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{route('client.gallery.delete', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
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
