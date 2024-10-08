@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Category</h4>

                        <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="category_name" type="text" id="example-text-input">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Category Slug</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="slug" type="text" id="example-search-input">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Category Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="image" type="file" id="image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{(!empty($item->image))?url('upload/category/'.$item->image):url('upload/no_image.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Category">
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
                category_name: {
                    required : true,
                },
                slug:{
                    required : true,
                },
                image: {
                    required : true,
                },

            },
            messages :{
                category_name: {
                    required : 'Please Enter CategoryName',
                },
                slug:{
                    required : 'Please Enter Slug',
                },
                image: {
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
