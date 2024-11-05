@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Role in Permitions </h4>

                            <form action="{{ route('admin.addRole.store') }}" method="POST" id="myForm">
                                @csrf
                                <div class=row>
                                    <div class="col-lg-6">
                                        <div>

                                            <div class="mb-3 form-group">
                                                <label for="example-search-input" class="form-label">Role Name</label>
                                                <select name="role_id" id="role_id">
                                                    <option selected disabled>Open this select menu</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            {{-- check box  --}}
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">All Permitions</label>
                                                <hr>
                                                @foreach ($permition_group as $group)
                                                    {{-- dd($group); --}}
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            @php
                                                                $permitions = App\Models\Admin::getGroupPermitions($group->group_name);
                                                            @endphp

                                                            @foreach ($permitions as $permition)
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="flexCheckDefault">
                                                                <label class="form-check-label"
                                                                    for="flexCheckDefault">{{ $permition->name }}</label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Permission">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    guard_name: {
                        required: true,
                    },
                    group_name: {
                        required: true,
                    },


                },
                messages: {
                    name: {
                        required: 'Please Enter Permistion Name',
                    },
                    guard_name: {
                        required: 'Please Enter Guard Name',
                    },
                    group_name: {
                        required: 'Please Enter Group Name',
                    },




                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
