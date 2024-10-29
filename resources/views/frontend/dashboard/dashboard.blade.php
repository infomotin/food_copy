@include('frontend.dashboard.header')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@php
    $userData = Auth::user();
    $userOrders = \App\Models\Order::where('user_id', Auth::user()->id)
        ->orderBy('id', 'DESC')
        ->get();
@endphp


<section class="pt-4 pb-4 section osahan-account-page">
    <div class="container">
        <div class="row">
            @include('frontend.dashboard.sidebar')
            <div class="col-md-9">
                <div class="p-4 bg-white rounded shadow-sm osahan-account-page-right h-100">
                    <div class="tab-content" id="myTabContent">

                        {{-- =================================================== --}}
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="orders-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">User Profile</h4>
                            <div class="mb-4 bg-white shadow-sm card order-list">
                                <div class="p-4 gold-members">
                                    <form action="{{ route('profile.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">

                                                    <div class="p-4 card-body">

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <div class="mb-3">
                                                                        <label for="example-text-input"
                                                                            class="form-label">Name</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $userData->name }}" id="name"
                                                                            name="name">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="example-text-input"
                                                                            class="form-label">User Name</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $userData->username }}"
                                                                            id="username" name="username">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="example-number-input"
                                                                            class="form-label">User Email</label>
                                                                        <input class="form-control" type="email"
                                                                            value="{{ $userData->email }}"
                                                                            id="email" name="email">
                                                                    </div>
                                                                    <div>
                                                                        <label for="example-datetime-local-input"
                                                                            class="form-label">Date of Barth </label>
                                                                        <input class="form-control" type="date"
                                                                            value="{{ $userData->birth_date }}"
                                                                            id="birth_date" name="birth_date">
                                                                    </div>
                                                                    <div>
                                                                        <label for="example-datetime-local-input"
                                                                            class="form-label">Phone </label>
                                                                        <input class="form-control" type="number"
                                                                            value="{{ $userData->phone }}"
                                                                            id="phone" name="phone">
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mt-3 mt-lg-0">
                                                                    <div class="mb-3">
                                                                        <label for="example-date-input"
                                                                            class="form-label">Address</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $userData->address }}"
                                                                            id="address" name="address">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Sex</label>
                                                                        <select class="form-select">
                                                                            <option>Select</option>
                                                                            <option>Male</option>
                                                                            <option>Female </option>
                                                                        </select>
                                                                    </div>

                                                                    <div>
                                                                        <label for="exampleDataList"
                                                                            class="form-label">Datalists</label>
                                                                        <input class="form-control"
                                                                            list="datalistOptions" id="exampleDataList"
                                                                            placeholder="Type to search...">
                                                                        <datalist id="datalistOptions">
                                                                            <option value="San Francisco">
                                                                            <option value="New York">
                                                                            <option value="Seattle">
                                                                            <option value="Los Angeles">
                                                                            <option value="Chicago">
                                                                        </datalist>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="example-date-input"
                                                                            class="form-label">Profile Image</label>
                                                                        <input class="form-control" type="file"
                                                                            value="{{ $userData->profile_photo_path }}"
                                                                            id="profile_photo_path"
                                                                            name="profile_photo_path">
                                                                    </div>
                                                                    <div class="mb-3">

                                                                        <img id="showImage"
                                                                            src="{{ !empty($userData->profile_photo_path) ? url('upload/users/' . $userData->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                                            alt=""
                                                                            class="p-1 rounded-circle bg-light"
                                                                            width="150">
                                                                    </div>
                                                                    <div class="mt-3">
                                                                        <button type="submit"
                                                                            class="btn btn-primary w-md">Update</button>
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
                                </div>
                            </div>
                        </div>
                        {{-- ============================================================================ --}}
                        <div class="tab-pane fade " id="changepassword" role="tabpanel"
                            aria-labelledby="orders-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Change Password</h4>
                            <div class="mb-4 bg-white shadow-sm card order-list">
                                <div class="p-4 gold-members">
                                    <form action="{{ route('change.password') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="p-4 card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <div class="mb-3">
                                                                        <label for="example-text-input"
                                                                            class="form-label">Old Password</label>
                                                                        <input class="form-control" type="text"
                                                                            id="old_password" name="old_password">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="example-text-input"
                                                                            class="form-label">New Password</label>
                                                                        <input class="form-control" type="password"
                                                                            id="password" name="password">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="example-number-input"
                                                                            class="form-label">Confirm Password</label>
                                                                        <input class="form-control" type="password"
                                                                            id="confirm_password"
                                                                            name="confirm_password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <button type="submit" class="btn btn-primary w-md">change
                                                                Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- =================================================================== --}}
                        <div class="tab-pane fade " id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Past Orders</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Inv</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <td>Cancel</td>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userOrders as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->order_date }}</td>
                                            <td>{{ $item->invoice_no }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td style="front-size: 7px">{{ $item->payment_type }}</td>


                                            <td>
                                                <a href="{{ route('user.order.cancel', $item->id) }}"
                                                    class="btn btn-block btn-danger btn-sm" id="cancel">Cancel
                                                    Order</a>
                                            </td>

                                            <td>
                                                @if ($item->status == 'pending')
                                                    <a href="{{ route('admin.order.confirm', $item->id) }}"
                                                        class="btn btn-block btn-successn btn-sm" id="confirm">Confirm
                                                        Order</a>
                                                @elseif ($item->status == 'confirm')
                                                    <a href="{{ route('admin.order.processing', $item->id) }}"
                                                        class="btn btn-block btn-success btn-sm" id="processing">Processing
                                                        Order</a>
                                                @elseif ($item->status == 'processing')
                                                    <a href="{{ route('admin.order.deliverd', $item->id) }}"
                                                        class="btn btn-block btn-success btn-sm" id="deliverd">Deliverd
                                                        Order</a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- ========================================================================= --}}

                        {{-- <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Offers</h4>
                            <div class="pb-2 mb-4 row">
                                <div class="col-md-6">
                                    <div class="shadow-sm card offer-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><img src="img/bank/1.png"> OSAHANEAT50</h5>
                                            <h6 class="mb-2 card-subtitle text-block">Get 50% OFF on your first osahan
                                                eat order</h6>
                                            <p class="card-text">Use code OSAHANEAT50 &amp; get 50% off on your first
                                                osahan order on Website and Mobile site. Maximum discount: $200</p>
                                            <a href="#" class="card-link">COPY CODE</a>
                                            <a href="#" class="card-link">KNOW MORE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="shadow-sm card offer-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><img src="img/bank/2.png"> EAT730</h5>
                                            <h6 class="mb-2 card-subtitle text-block">Get 50% OFF on your first osahan
                                                eat order</h6>
                                            <p class="card-text">Use code EAT730 &amp; get 50% off on your first osahan
                                                order on Website and Mobile site. Maximum discount: $600</p>
                                            <a href="#" class="card-link">COPY CODE</a>
                                            <a href="#" class="card-link">KNOW MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        <div class="tab-pane fade" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Favourites</h4>
                            <div class="row">
                                @php
                                    $favourites = \App\Models\Wishlist::where('user_id', Auth::id())->get();
                                @endphp
                                @foreach ($favourites as $favourite)
                                    <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                        <div
                                            class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                            <div class="list-card-image">
                                                <div class="star position-absolute"><span
                                                        class="badge badge-success"><i class="icofont-star"></i> 3.1
                                                        (300+)
                                                    </span></div>
                                                <div class="favourite-heart text-danger position-absolute"><a
                                                        href="{{ route('restaurant.detail', $favourite['client']['id']) }}"><i
                                                            class="icofont-heart"></i></a></div>
                                                <div class="member-plan position-absolute"><span
                                                        class="badge badge-dark">Promoted</span></div>
                                                <a
                                                    href="{{ route('restaurant.detail', $favourite['client']['id']) }}">
                                                    <img src="{{ asset('/upload/clients/' . $favourite['client']['cover_photo']) }}"
                                                        class="img-fluid item-img"
                                                        style="width: 300px; height: 200px;">
                                                </a>
                                            </div>
                                            <div class="p-3 position-relative">
                                                <div class="list-card-body">
                                                    <h6 class="mb-1"><a
                                                            href="{{ route('restaurant.detail', $favourite['client']['id']) }}"
                                                            class="text-black">{{ $favourite['client']['name'] }}</a>
                                                        </a>
                                                    </h6>


                                                </div>
                                                <div class="float-right; margin-bottom: 10px;">
                                                    <a href="{{ route('user.favourites.delete', $favourite['client']['id']) }}"
                                                        class="badge badge-danger">
                                                        <i class="icofont-ui-delete"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach






                                <div class="text-center col-md-12 load-more">
                                    <button class="btn btn-primary" type="button" disabled>
                                        <span class="spinner-grow spinner-grow-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Payments</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/1.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/2.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 pb-2 row">
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/3.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/4.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/5.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/6.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 row">
                                <div class="col-md-6">
                                    <div class="bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/1.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p class="text-black">VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-white shadow-sm card payments-item">
                                        <div class="p-4 gold-members">
                                            <a href="#">
                                                <div class="media">
                                                    <img class="mr-3" src="img/bank/2.png"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">6070-XXXXXXXX-0666</h6>
                                                        <p>VALID TILL 10/2025</p>
                                                        <p class="mb-0 text-black font-weight-bold">
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="icofont-ui-delete"></i> DELETE</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Manage Addresses</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white border shadow card addresses-item border-primary">
                                        <div class="p-4 gold-members">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
                                                <div class="media-body">
                                                    <h6 class="mb-1 text-secondary">Home</h6>
                                                    <p class="text-black">Osahan House, Jawaddi Kalan, Ludhiana, Punjab
                                                        141002, India
                                                    </p>
                                                    <p class="mb-0 text-black font-weight-bold"><a
                                                            class="mr-3 text-primary" data-toggle="modal"
                                                            data-target="#add-address-modal" href="#"><i
                                                                class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card addresses-item">
                                        <div class="p-4 gold-members">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>
                                                <div class="media-body">
                                                    <h6 class="mb-1">Work</h6>
                                                    <p>NCC, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab
                                                        141002, India
                                                    </p>
                                                    <p class="mb-0 text-black font-weight-bold"><a
                                                            class="mr-3 text-primary" data-toggle="modal"
                                                            data-target="#add-address-modal" href="#"><i
                                                                class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 pb-2 row">
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card addresses-item">
                                        <div class="p-4 gold-members">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-1">Other</h6>
                                                    <p>Delhi Bypass Rd, Jawaddi Taksal, Ludhiana, Punjab 141002, India
                                                    </p>
                                                    <p class="mb-0 text-black font-weight-bold"><a
                                                            class="mr-3 text-primary" data-toggle="modal"
                                                            data-target="#add-address-modal" href="#"><i
                                                                class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 bg-white shadow-sm card addresses-item">
                                        <div class="p-4 gold-members">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-1">Other</h6>
                                                    <p>MT, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab
                                                        141002, India
                                                    </p>
                                                    <p class="mb-0 text-black font-weight-bold"><a
                                                            class="mr-3 text-primary" data-toggle="modal"
                                                            data-target="#add-address-modal" href="#"><i
                                                                class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bg-white shadow-sm card addresses-item">
                                        <div class="p-4 gold-members">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-1">Other</h6>
                                                    <p>GNE Rd, Jawaddi Taksal, Ludhiana, Punjab 141002, India
                                                    </p>
                                                    <p class="mb-0 text-black font-weight-bold"><a
                                                            class="mr-3 text-primary" data-toggle="modal"
                                                            data-target="#add-address-modal" href="#"><i
                                                                class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-white shadow-sm card addresses-item">
                                        <div class="p-4 gold-members">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-1">Other</h6>
                                                    <p>GTTT, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab
                                                        141002, India
                                                    </p>
                                                    <p class="mb-0 text-black font-weight-bold"><a
                                                            class="mr-3 text-primary" data-toggle="modal"
                                                            data-target="#add-address-modal" href="#"><i
                                                                class="icofont-ui-edit"></i> EDIT</a> <a
                                                            class="text-danger" data-toggle="modal"
                                                            data-target="#delete-address-modal" href="#"><i
                                                                class="icofont-ui-delete"></i> DELETE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#profile_photo_path').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>


@include('frontend.dashboard.footer')
