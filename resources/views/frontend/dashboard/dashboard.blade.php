@include('frontend.dashboard.header')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
@php
$userData = Auth::user();
// dd($user);
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
                                    <form action="{{route('profile.store')}}" method="POST"
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
                                                                            value="{{$userData->name}}" id="name"
                                                                            name="name">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="example-text-input"
                                                                            class="form-label">User Name</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{$userData->username}}"
                                                                            id="username" name="username">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="example-number-input"
                                                                            class="form-label">User Email</label>
                                                                        <input class="form-control" type="email"
                                                                            value="{{$userData->email}}" id="email"
                                                                            name="email">
                                                                    </div>
                                                                    <div>
                                                                        <label for="example-datetime-local-input"
                                                                            class="form-label">Date of Barth </label>
                                                                        <input class="form-control" type="date"
                                                                            value="{{$userData->birth_date}}"
                                                                            id="birth_date" name="birth_date">
                                                                    </div>
                                                                    <div>
                                                                        <label for="example-datetime-local-input"
                                                                            class="form-label">Phone </label>
                                                                        <input class="form-control" type="number"
                                                                            value="{{$userData->phone}}" id="phone"
                                                                            name="phone">
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mt-3 mt-lg-0">
                                                                    <div class="mb-3">
                                                                        <label for="example-date-input"
                                                                            class="form-label">Address</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{$userData->address}}" id="address"
                                                                            name="address">
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
                                                                            value="{{$userData->profile_photo_path}}"
                                                                            id="profile_photo_path"
                                                                            name="profile_photo_path">
                                                                    </div>
                                                                    <div class="mb-3">

                                                                        <img id="showImage"
                                                                            src="{{(!empty($userData->profile_photo_path))?url('upload/users/'.$userData->profile_photo_path):url('upload/no_image.jpg')}}"
                                                                            alt="" class="p-1 rounded-circle bg-light"
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

                        {{-- =================================================================== --}}
                        <div class="tab-pane fade show " id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <h4 class="mt-0 mb-4 font-weight-bold">Past Orders</h4>
                            <div class="mb-4 bg-white shadow-sm card order-list">
                                <div class="p-4 gold-members">
                                    <a href="#">
                                        <div class="media">
                                            <img class="mr-4" src="img/3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <span class="float-right text-info">Delivered on Mon, Nov 12, 7:18 PM <i
                                                        class="icofont-check-circled text-success"></i></span>
                                                <h6 class="mb-2">
                                                    <a href="detail.html" class="text-black">Gus's World Famous Fried
                                                        Chicken
                                                    </a>
                                                </h6>
                                                <p class="mb-1 text-gray"><i class="icofont-location-arrow"></i> 730 S
                                                    Mendenhall Rd, Memphis, TN 38117, USA
                                                </p>
                                                <p class="mb-3 text-gray"><i class="icofont-list"></i> ORDER
                                                    #25102589748 <i class="ml-2 icofont-clock-time"></i> Mon, Nov 12,
                                                    6:26 PM</p>
                                                <p class="text-dark">Veg Masala Roll x 1, Veg Burger x 1, Veg Penne
                                                    Pasta in Red Sauce x 1
                                                </p>
                                                <hr>
                                                <div class="float-right">
                                                    <a class="btn btn-sm btn-outline-primary" href="#"><i
                                                            class="icofont-headphone-alt"></i> HELP</a>
                                                    <a class="btn btn-sm btn-primary" href="detail.html"><i
                                                            class="icofont-refresh"></i> REORDER</a>
                                                </div>
                                                <p class="pt-2 mb-0 text-black text-primary"><span
                                                        class="text-black font-weight-bold"> Total Paid:</span> $300
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
                                <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                    <div
                                        class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i
                                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute"><a
                                                    href="detail.html"><i class="icofont-heart"></i></a></div>
                                            <div class="member-plan position-absolute"><span
                                                    class="badge badge-dark">Promoted</span></div>
                                            <a href="detail.html">
                                                <img src="img/list/4.png" class="img-fluid item-img">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="detail.html" class="text-black">Famous Dave's
                                                        Bar-B-Que
                                                    </a>
                                                </h6>
                                                <p class="mb-3 text-gray">Vegetarian • Indian • Pure veg</p>
                                                <p class="mb-3 text-gray time"><span
                                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                            class="icofont-wall-clock"></i> 15–30 min</span> <span
                                                        class="float-right text-black-50"> $350 FOR TWO</span></p>
                                            </div>
                                            <div class="list-card-badge">
                                                <span class="badge badge-danger">OFFER</span> <small> Use Coupon
                                                    OSAHAN50</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                    <div
                                        class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i
                                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute"><a
                                                    href="detail.html"><i class="icofont-heart"></i></a></div>
                                            <div class="member-plan position-absolute"><span
                                                    class="badge badge-dark">Promoted</span></div>
                                            <a href="detail.html">
                                                <img src="img/list/5.png" class="img-fluid item-img">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="detail.html" class="text-black">Thai Famous
                                                        Cuisine</a></h6>
                                                <p class="mb-3 text-gray">North Indian • Indian • Pure veg</p>
                                                <p class="mb-3 text-gray time"><span
                                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                            class="icofont-wall-clock"></i> 30–35 min</span> <span
                                                        class="float-right text-black-50"> $250 FOR TWO</span></p>
                                            </div>
                                            <div class="list-card-badge">
                                                <span class="badge badge-success">OFFER</span> <small>65% off</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                    <div
                                        class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i
                                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute"><a
                                                    href="detail.html"><i class="icofont-heart"></i></a></div>
                                            <div class="member-plan position-absolute"><span
                                                    class="badge badge-dark">Promoted</span></div>
                                            <a href="detail.html">
                                                <img src="img/list/6.png" class="img-fluid item-img">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="detail.html" class="text-black">The osahan
                                                        Restaurant
                                                    </a>
                                                </h6>
                                                <p class="mb-3 text-gray">North • Hamburgers • Pure veg</p>
                                                <p class="mb-3 text-gray time"><span
                                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                            class="icofont-wall-clock"></i> 15–25 min</span> <span
                                                        class="float-right text-black-50"> $500 FOR TWO</span></p>
                                            </div>
                                            <div class="list-card-badge">
                                                <span class="badge badge-danger">OFFER</span> <small>65%
                                                    OSAHAN50</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                    <div
                                        class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i
                                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute"><a
                                                    href="detail.html"><i class="icofont-heart"></i></a></div>
                                            <div class="member-plan position-absolute"><span
                                                    class="badge badge-dark">Promoted</span></div>
                                            <a href="detail.html">
                                                <img src="img/list/7.png" class="img-fluid item-img">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="detail.html" class="text-black">Stan's
                                                        Restaurant
                                                    </a>
                                                </h6>
                                                <p class="mb-3 text-gray">North Indian • Indian • Pure veg</p>
                                                <p class="mb-3 text-gray time"><span
                                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                            class="icofont-wall-clock"></i> 15–25 min</span> <span
                                                        class="float-right text-black-50"> $250 FOR TWO</span></p>
                                            </div>
                                            <div class="list-card-badge">
                                                <span class="badge badge-danger">OFFER</span> <small>65% Coupon
                                                    OSAHAN50</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                    <div
                                        class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i
                                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute"><a
                                                    href="detail.html"><i class="icofont-heart"></i></a></div>
                                            <div class="member-plan position-absolute"><span
                                                    class="badge badge-dark">Promoted</span></div>
                                            <a href="detail.html">
                                                <img src="img/list/8.png" class="img-fluid item-img">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="detail.html" class="text-black">Polo Lounge
                                                    </a>
                                                </h6>
                                                <p class="mb-3 text-gray">North Indian • Indian • Pure veg</p>
                                                <p class="mb-3 text-gray time"><span
                                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                            class="icofont-wall-clock"></i> 15–25 min</span> <span
                                                        class="float-right text-black-50"> $250 FOR TWO</span></p>
                                            </div>
                                            <div class="list-card-badge">
                                                <span class="badge badge-danger">OFFER</span> <small> Coupon
                                                    OSAHAN50</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2 mb-4 col-md-4 col-sm-6">
                                    <div
                                        class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i
                                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute"><a
                                                    href="detail.html"><i class="icofont-heart"></i></a></div>
                                            <div class="member-plan position-absolute"><span
                                                    class="badge badge-dark">Promoted</span></div>
                                            <a href="detail.html">
                                                <img src="img/list/9.png" class="img-fluid item-img">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="detail.html" class="text-black">Jack Fry's
                                                    </a>
                                                </h6>
                                                <p class="mb-3 text-gray">North Indian • Indian • Pure veg</p>
                                                <p class="mb-3 text-gray time"><span
                                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                            class="icofont-wall-clock"></i> 15–25 min</span> <span
                                                        class="float-right text-black-50"> $250 FOR TWO</span></p>
                                            </div>
                                            <div class="list-card-badge">
                                                <span class="badge badge-danger">OFFER</span> <small>65% </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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


                        {{-- <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
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
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
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
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
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
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
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
                                                <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
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
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
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
