@extends('admin.admin_dashboard')
@section('admin')
    {{-- load jquery cdn  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    {{-- load toggle cdn --}}
    <style>
        .form-check-input {
            cursor: pointer;
            width: 20px;
            height: 20px;
        }

        .form-check-label {
            text-transform: capitalize;
            cursor: pointer;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Update Role in Permitions </h4>

                            <form action="{{ route('admin.update.roleinpermition') }}" method="POST" id="myForm">
                                @csrf
                                <div class=row>
                                    <div class="col-lg-12">
                                        <div>
                                            <div class="mb-3 form-group">
                                                <label for="example-text-input" class="form-label">Role Name</label>
                                                <input class="form-control" name="role_name" type="text"
                                                    id="example-text-input" value="{{ $role->name }}" readonly>

                                            </div>

                                            {{-- check box  --}}
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="formCheckall"
                                                    name="all_permition">
                                                <label class="form-check-label" for="formCheckall">All Permitions</label>
                                                <hr>
                                                @foreach ($permition_group as $group)
                                                    {{-- dd($group); --}}
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            @php
                                                                $permitions = App\Models\Admin::getPermissionsByGroupName(
                                                                    $group->group_name,
                                                                );
                                                                // print_r($permitions);
                                                            @endphp
                                                            <div class="mb-3 form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="" 
                                                                    id="flexCheckDefault {{ 
                                                                    
                                                                    App\Models\Admin::roleHasPermition($role, $permitions) ? 'checked' : '' 
                                                                    }}">
                                                                <label class="form-check-label"
                                                                    for="flexCheckDefault">{{ $group->group_name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">

                                                            @foreach ($permitions as $permition)
                                                                <div class="mb-3 form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="flexCheckDefault{{ $permition->id }} {{ $role->hasPermissionTo($permition->name) ? 'checked' : '' }}"
                                                                        name="permition[]" value="{{ $permition->id }}">
                                                                    <label class="form-check-label"
                                                                        for="flexCheckDefault{{ $permition->id }}">{{ $permition->name }}</label>
                                                                </div>
                                                            @endforeach
                                                            <br>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Role In Permission">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
    <script>
        $('#formCheckall').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
@endsection
