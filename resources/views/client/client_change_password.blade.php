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
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->
        <form action="{{route('client.change_password_submit')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password </h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                        </div>
                        <div class="p-4 card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Old Password</label>
                                            <input class="form-control"
                                                @error('password')
                                                is-invalid
                                                @enderror
                                                type="password" id="password" name="password">
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">New Password</label>
                                            <input class="form-control"  @error('new_password')
                                            is-invalid
                                            @enderror type="text"
                                                id="new_password" name="new_password">
                                                @error('new_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-number-input" class="form-label">Confirm Password</label>
                                            <input class="form-control"  @error('confirm_password')
                                            is-invalid
                                            @enderror type="text"
                                                id="confirm_password" name="confirm_password">
                                                @error('confirm_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div> <!-- container-fluid -->
</div>



@endsection
