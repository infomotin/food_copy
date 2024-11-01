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
                    <h4 class="mb-sm-0 font-size-18">Pending Review </h4>

                    

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
                                    <th>Date </th>
                                    <th>Review</th>
                                    <th>Ratting</th>
                                    <th>Restarunts</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                    <td>{{Str::limit($item->review, 10)}} {{strlen($item->review) > 10 ? '...' : ''}} </td>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                        <i class="bx bxs-star {{$i <= $item->ratting ? 'text-warning' : 'text-secondary'}}"></i>
                                        @endfor
                                    </td>
                                    <td>{{$item['client']['name']}}</td>
                                    <td>{{$item['user']['name']}}</td>
                                    <td>
                                        <input type="checkbox" class="toggle-class" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="Inactive" data-id="{{$item->id}}" {{$item->status == '0' ?
                                        'checked' : ''}} id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.review.delete', $item->id) }}" class="btn btn-info sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
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
        //   alert("AdminchangeReviewStatus");
          var status = $(this).prop('checked') == true ? '1' : '0';
          var id = $(this).data('id');
            console.log(status);
            console.log(id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/AdminchangeReviewStatus',
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
