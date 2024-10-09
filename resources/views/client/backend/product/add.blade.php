@extends('client.client_dashboard')
@section('client')
<div class="page-content">
    <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Product</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                        <h4 class="card-title">Add Food Product</h4>
                        <form action="{{route('client.menu.store')}}" method="POST" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Category Name</label>
                                        <select class="form-select" name="category_id" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Manu Name</label>
                                        <select class="form-select" name="category_id" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($menus as $category)
                                            <option value="{{ $category->id }}">{{ $category->menu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">City Name</label>
                                        <select class="form-select" name="category_id" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($cities as $category)
                                            <option value="{{ $category->id }}">{{ $category->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Slug</label>
                                        <input class="form-control" name="menu_slug" type="text" id="example-search-input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Slug</label>
                                        <input class="form-control" name="menu_slug" type="text" id="example-search-input">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Slug</label>
                                        <input class="form-control" name="menu_slug" type="text" id="example-search-input">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Slug</label>
                                        <input class="form-control" name="menu_slug" type="text" id="example-search-input">
                                    </div>
                                </div>







                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Menu">
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
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                menu_name: {
                    required : true,
                },
                menu_slug:{
                    required : true,
                },
                menu_icon: {
                    required : true,
                },

            },
            messages :{
                menu_name: {
                    required : 'Please Enter CategoryName',
                },
                menu_slug:{
                    required : 'Please Enter Slug',
                },
                menu_icon: {
                    required : 'Please Enter Image',
                },


            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endsection
