@extends('admin.admin_dashboard')
@section('admin')
{{-- load jquare cdn --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
{{-- load toggle cdn --}}
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Permitons</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <a href="{{route('add.role.permition')}}"
                                class="btn btn-primary waves-effect waves-light">Add Role</a>&nbsp;&nbsp;
                                
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
                                    <th>Role Name </th>
                                    <th>Permitions Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @foreach( $item->permissions as $permition)
                                            <span class="badge badge-soft-primary">{{$permition->name}}</span>
                                            
                                        @endforeach
                                    </td>
                                    
                                    {{-- <td>
                                        <input type="checkbox" class="toggle-class" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="Inactive" data-id="{{$item->id}}" {{$item->status == 'active' ?
                                        'checked' : ''}} id="flexCheckDefault">
                                    </td> --}}
                                    <td>
                                        <a href="{{route('admin.edit.roleinpermition', $item->id)}}" class="btn btn-info sm"
                                            title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{route('admin.delete.roleinpermition', $item->id)}}"
                                            class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                class="fas fa-trash-alt"></i> </a>


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
<script type="text/javascript">
    // $(function() {
    //   $('.toggle-class').change(function() {
    //       var status = $(this).prop('checked') == true ? 'active' : 'inactive';
    //       var id = $(this).data('id');
    //         console.log(status);
    //         console.log(id);
    //       $.ajax({
    //           type: "GET",
    //           dataType: "json",
    //           url:'{{ route('AdminChangeStatus') }}',
    //           data: {
    //             'status': status, 
    //             'id': id
    //         },
    //           success: function(response){
    //             console.log(response);
    //                 location.reload();
    //           const Toast = Swal.mixin({
    //                 toast: true,
    //                 position: 'top-end',
    //                 icon: 'success',
    //                 showConfirmButton: false,
    //                 timer: 3000
    //           })
    //           if ($.isEmptyObject(data.error)) {

    //                   Toast.fire({
    //                   type: 'success',
    //                   title: data.success,
    //                   })

    //           }else{

    //          Toast.fire({
    //                   type: 'error',
    //                   title: data.error,
    //                   })
    //               }

    //             // End Message


    //           }
    //       });
    //   });
    // });
</script>

@endsection
