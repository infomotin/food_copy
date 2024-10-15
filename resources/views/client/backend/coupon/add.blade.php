@extends('client.client_dashboard')
@section('client')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Coupon</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Coupon</a></li>
                            <li class="breadcrumb-item active">Add Coupon</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Coupon</h4>

                        <form action="{{route('client.coupon.store')}}" method="POST" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Coupon Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="coupon_name" type="text" id="example-text-input">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">coupon_description</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="coupon_description" type="text" id="example-search-input">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">coupon_discount</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="coupon_discount" type="text" id="example-search-input">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">coupon_validity</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="coupon_validity" type="datetime-local" id="example-search-input" min="{{Carbon\Carbon::now()->format('Y-m-d\TH:i')}}">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Coupon">
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
