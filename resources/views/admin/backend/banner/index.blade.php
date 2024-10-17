@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Banner</h4>
                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#myModal">Add Banner</button>
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
                                    <th>Sl</th>
                                    <th>Banner Image</th>
                                    <th>Banner Url</th>
                                    <th>Action </th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($banners as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="" style="width: 70px; height:40px;">
                                    </td>
                                    <td>{{ $item->url }}</td>
                                    <td>

                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#myEdit" id="{{ $item->id }}"
                                            onclick="bannerEdit(this.id)">Edit</button>

                                        <a href="{{ route('admin.banner.delete', $item->id) }}" class="btn btn-danger waves-effect waves-light"
                                            id="delete">Delete</a>
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


<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-3 form-group">
                                    <label for="example-text-input" class="form-label">Bannaer Url</label>
                                    <input class="form-control" type="text" name="url">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="example-text-input" class="form-label">Banner Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="mb-3 form-group">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{(!empty($item->image))?url('upload/banners/'.$item->image):url('upload/no_image.jpg')}}"
                                        alt="Card image cap">
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



<!-- Edit modal content -->
<div id="myEdit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="myForm" action="{{route('admin.update.banner')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="banner_id" id="banner_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-3 form-group">
                                    <label for="example-text-input" class="form-label">Bannaer Url</label>
                                    <input class="form-control" type="text" name="url" id="url">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="example-text-input" class="form-label">Banner Image</label>
                                    <input class="form-control" type="file" name="image" id="imageE">
                                </div>
                                <div class="mb-3 form-group">
                                    <img id="bannerImage" class="rounded avatar-lg"
                                        src=""
                                        alt="Card image cap" >
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function bannerEdit(id){
            // console.log(id);
            $.ajax({
                type: 'GET',
                // url: "{{url('/edit/admin/banner/')}}/"+id,
                url:'/edit/admin/banner/'+id,
                // url: "{{route('admin.banner.edit', ':id')}}".replace(':id', id),
                dataType: 'json',
                success:function(data){
                    //  console.log(data)
                    $('#url').val(data.url);
                    $('#bannerImage').attr('src', data.image);
                    $('#banner_id').val(data.id);
                }
            })
        }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#imageE').change(function(e){
            // console.log(e);
            var reader = new FileReader();
            reader.onload = function(e){
                $('#bannerImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>







@endsection
