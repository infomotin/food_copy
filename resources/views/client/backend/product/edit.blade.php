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
                            <li class="breadcrumb-item active">Edit Product</li>
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
                        <form action="{{route('client.product.update', $product->id)}}" method="POST"
                            enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Category Name</label>
                                        <select class="form-select" name="category_id"
                                            aria-label="Default select example">
                                            <option selected="" disabled="">Open this select menu</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id ==
                                                $product->category_id ? 'selected': ''}}>{{ $category->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Manu Name</label>
                                        <select class="form-select" name="menu_id" aria-label="Default select example">
                                            <option selected="" disabled="">Open this select menu</option>
                                            @foreach ($menus as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->menu_id ?
                                                'selected': ''}}>{{ $category->menu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">City Name</label>
                                        <select class="form-select" name="city_id" aria-label="Default select example">
                                            <option selected="" disabled="">Open this select menu</option>
                                            @foreach ($cities as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->city_id ?
                                                'selected': ''}}>{{ $category->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Name</label>
                                        <input class="form-control" name="name" type="text" id="example-search-input"
                                            value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Price</label>
                                        <input class="form-control" name="price" type="text" id="example-search-input"
                                            value="{{ $product->price }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Size</label>
                                        <input class="form-control" name="size" type="text" id="example-search-input"
                                            value="{{ $product->size }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Qty</label>
                                        <input class="form-control" name="qty" type="text" id="example-search-input"
                                            value="{{ $product->qty }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" {{
                                            $product->most_popular == 1 ? 'checked': ''}} id="flexCheckDefault"
                                        name="most_popular">
                                        <label class="form-check-label" for="flexCheckDefault">Is Most Popular?</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input class="form-check-input" type="checkbox" value="1" {{
                                            $product->best_seller == 1 ? 'checked': '' }} id="flexCheckDefault"
                                        name="best_seller">
                                        <label class="form-check-label" for="flexCheckDefault">Is Best Seller</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Discount Price</label>
                                        <input class="form-control" name="discount_price" type="text"
                                            id="example-search-input" value="{{ $product->discount_price }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-search-input" class="form-label">Product Description</label>
                                        <textarea name="description" class="form-control" id="example-search-input"
                                            cols="3" rows="2" value="{{ $product->description }}">

                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Product
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="image" type="file" id="image">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="example-url-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{(!empty($product->image))?url('upload/products/'.$product->image):url('upload/no_image.jpg')}}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Product">
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
                category_id: {
                    required : true,
                },
                menu_id:{
                    required : true,
                },
                city_id:{
                    required : true,
                },
                name:{
                    required : true,
                },
                price:{
                    required : true,
                },




            },
            messages :{
                category_id: {
                    required : 'Please Enter CategoryName',
                },
                menu_id: {
                    required : 'Please Enter CategoryName',
                },
                city_id: {
                    required : 'Please Enter CategoryName',
                },
                name: {
                    required : 'Please Enter CategoryName',
                },
                price: {
                    required : 'Please Enter CategoryName',
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
