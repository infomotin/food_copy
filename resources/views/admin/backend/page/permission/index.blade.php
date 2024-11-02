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
                            <a href="{{route('admin.add.permition')}}"
                                class="btn btn-primary waves-effect waves-light">Add Permitons</a>
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
                                    <th>Name </th>
                                    <th>Guard Name</th>
                                    <th>Group Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permitions as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->guard_name}}</td>
                                    <td>{{$item->group_name}}</td>
                                    <td>
                                        <input type="checkbox" class="toggle-class" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="Inactive" data-id="{{$item->id}}" {{$item->status == '1' ?
                                        'checked' : ''}} id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.edit.restaurant', $item->id)}}" class="btn btn-info sm"
                                            title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{route('admin.delete.restaurant', $item->id)}}"
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
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'active' : 'inactive';
          var id = $(this).data('id');
            // console.log(status);
            // console.log(product_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/ClientchangeStatus',
              data: {'status': status, 'id': id},
              success: function(data){
                // console.log(data);

                // Start Message
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
              })
              if ($.isEmptyObject(data.error)) {

                      Toast.fire({
                      type: 'success',
                      title: data.success,
                      })

              }else{

             Toast.fire({
                      type: 'error',
                      title: data.error,
                      })
                  }

                // End Message


              }
          });
      });
    });
</script>

@endsection
