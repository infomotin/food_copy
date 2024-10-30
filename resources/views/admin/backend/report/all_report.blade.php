@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Admin All Report</h4>
                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            
                        </div>

                        <div class="card-body">
                            <div>
                                
                                <div class="p-3 text-center bg-light-subtle">
                                    <div class="row align-items-start">
                                        @php 
                                            $categories = DB::table('categories')->get();
                                            $menus = DB::table('menus')->get();
                                            $cities = DB::table('cities')->get();
                                        @endphp
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Category Name</label>
                                                <select class="form-select" name="category_id" aria-label="Default select example">
                                                    <option selected="" disabled ="">Open this select menu</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Manu Name</label>
                                                <select class="form-select" name="menu_id" aria-label="Default select example">
                                                    <option selected="" disabled ="">Open this select menu</option>
                                                    @foreach ($menus as $category)
                                                    <option value="{{ $category->id }}">{{ $category->menu_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">City Name</label>
                                                <select class="form-select" name="city_id" aria-label="Default select example">
                                                    <option selected="" disabled ="">Open this select menu</option>
                                                    @foreach ($cities as $category)
                                                    <option value="{{ $category->id }}">{{ $category->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
