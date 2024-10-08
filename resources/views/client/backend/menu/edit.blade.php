@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Menu</h4>

                        <form action="{{route('client.menu.update', $menu->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Menu Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="menu_name" type="text" id="example-text-input" value="{{$menu->menu_name}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Category Slug</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="menu_slug" type="text" id="example-search-input" value="{{$menu->menu_slug}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Category Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="menu_icon" type="file" id="image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{(!empty($menu->menu_icon))?url('upload/menus/'.$menu->menu_icon):url('upload/no_image.png')}}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Menu">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>
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
@endsection
