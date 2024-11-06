@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add City</h4>

                        <form action="{{route('admin.addPermission.update', $permition->id)}}" method="POST"  id="myForm">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Permistion Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" id="example-text-input" value="{{$permition->name}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Guard Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="guard_name" type="text" id="example-search-input" value="{{$permition->guard_name}}" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Group Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="group_name" type="text" id="example-search-input" value="{{$permition->group_name}}">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update permition">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                guard_name:{
                    required : true,
                },
                group_name:{
                    required : true,
                },


            },
            messages :{
                name: {
                    required : 'Please Enter Permistion Name',
                },
                guard_name:{
                    required : 'Please Enter Guard Name',
                },
                group_name:{
                    required : 'Please Enter Group Name',
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