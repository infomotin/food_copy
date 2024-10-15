@extends('client.client_dashboard')

@section('client')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Profile</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                        <div class="row">
                            <div class="order-2 col-sm order-sm-1">
                                <div class="mt-3 d-flex align-items-start mt-sm-0">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xl me-3">
                                            {{-- {!! $userData->profile_photo_path !!} --}}
                                            <img src="{{(!empty($userData->profile_photo_path))?url('upload/clients/'.$userData->profile_photo_path):url('upload/no_image.jpg')}}" alt="" class="img-fluid rounded-circle d-block">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="mb-1 font-size-16">{{$userData->name}}</h5>
                                            <p class="text-muted font-size-13">{{$userData->address}}</p>

                                            <div class="flex-wrap gap-2 d-flex align-items-start gap-lg-3 text-muted font-size-13">
                                                <div><i class="align-middle mdi mdi-circle-medium me-1 text-success"></i>{{$userData->phone}}</div>
                                                <div><i class="align-middle mdi mdi-circle-medium me-1 text-success"></i>{{$userData->email}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-1 col-sm-auto order-sm-2">
                                <div class="gap-2 d-flex align-items-start justify-content-end">
                                    <div>
                                        <button type="button" class="btn btn-soft-light"><i class="me-1"></i> Message</button>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <button class="shadow-none btn btn-link font-size-16 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="mt-4 nav nav-tabs-custom card-header-tabs border-top" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="px-3 nav-link active" data-bs-toggle="tab" href="#overview" role="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="px-3 nav-link" data-bs-toggle="tab" href="#about" role="tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="px-3 nav-link" data-bs-toggle="tab" href="#post" role="tab">Post</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->


            </div>

        </div>
        <!-- end row -->
        <form action="{{route('client.profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Profile</h4>
                        <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                            textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                    </div>
                    <div class="p-4 card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Name</label>
                                        <input class="form-control" type="text" value="{{$userData->name}}" id="name" name="name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">User Name</label>
                                        <input class="form-control" type="text" value="{{$userData->username}}" id="username" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-number-input" class="form-label">User Email</label>
                                        <input class="form-control" type="email" value="{{$userData->email}}" id="email" name="email">
                                    </div>
                                    <div>
                                        <label for="example-datetime-local-input" class="form-label">Date of Barth </label>
                                        <input class="form-control" type="date" value="{{$userData->birth_date}}" id="birth_date" name="birth_date">
                                    </div>
                                    <div>
                                        <label for="example-datetime-local-input" class="form-label">Phone </label>
                                        <input class="form-control" type="text" value="{{$userData->phone}}" id="phone" name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Cover Image</label>
                                        <input class="form-control" type="file" value="{{$userData->cover_photo}}" id="cover_photo" name="cover_photo">
                                    </div>
                                    <div class="mb-3">

                                        <img id="showImage" src="{{(!empty($userData->cover_photo))?url('upload/clients/'.$userData->cover_photo):url('upload/no_image.jpg')}}" alt="" class="p-1 rounded-circle bg-light" width="150">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Address</label>
                                        <input class="form-control" type="text" value="{{$userData->address}}" id="address" name="address">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <select class="form-select" name="city_id">
                                            <option>Open this select menu</option>
                                            @php
                                                $cities = App\Models\City::all();
                                            @endphp
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{$city->id == $userData->city_id ? 'selected': ''}} >{{$city->city_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div>
                                        <label for="exampleDataList" class="form-label">Shop Information</label>
                                        <input class="form-control" type="text" value="{{$userData->shopinfo}}" id="shopinfo" name="shopinfo">


                                    </div>

                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Profile Image</label>
                                        <input class="form-control" type="file" value="{{$userData->profile_photo_path}}" id="profile_photo_path" name="profile_photo_path">
                                    </div>
                                    <div class="mb-3">

                                        <img id="showImage" src="{{(!empty($userData->profile_photo_path))?url('upload/clients/'.$userData->profile_photo_path):url('upload/no_image.jpg')}}" alt="" class="p-1 rounded-circle bg-light" width="150">
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary w-md">Update</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        </form>

    </div> <!-- container-fluid -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#profile_photo_path').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection
