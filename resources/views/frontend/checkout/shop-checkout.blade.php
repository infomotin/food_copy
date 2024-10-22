@include('frontend.dashboard.header')

{{-- modal --}}
<div class="modal fade" id="add-address-modal" tabindex="-1" role="dialog" aria-labelledby="add-address" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-address">Add Delivery Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Delivery Area</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Delivery Area">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                            class="icofont-ui-pointer"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Complete Address
                            </label>
                            <input type="text" class="form-control"
                                placeholder="Complete Address e.g. house number, street name, landmark">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Delivery Instructions
                            </label>
                            <input type="text" class="form-control"
                                placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall">
                        </div>
                        <div class="mb-0 form-group col-md-12">
                            <label for="inputPassword4">Nickname
                            </label>
                            <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                <label class="btn btn-info active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Home
                                </label>
                                <label class="btn btn-info">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> Work
                                </label>
                                <label class="btn btn-info">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> Other
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="text-center btn d-flex w-50 justify-content-center btn-outline-primary"
                    data-dismiss="modal">CANCEL
                </button><button type="button"
                    class="text-center btn d-flex w-50 justify-content-center btn-primary">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
<section class="pt-2 pb-2 mt-4 mb-4 offer-dedicated-body">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="offer-dedicated-body-left">
                    <div class="p-4 mb-4 bg-white rounded shadow-sm">
                        <h6 class="mb-3">You may also like</h6>
                        <div class="owl-carousel owl-theme owl-carousel-five offers-interested-carousel">
                            <div class="item">
                                <div class="mall-category-item position-relative">
                                    <a class="btn btn-primary btn-sm position-absolute" href="#">ADD</a>
                                    <img class="img-fluid" src="{{ asset('frontend/img/list/1.png') }}">
                                    <h6>Burgers</h6>
                                    <small>$500</small>
                                </div>
                            </div>
                            <div class="item">
                                <div class="mall-category-item position-relative">
                                    <a class="btn btn-primary btn-sm position-absolute" href="#">ADD</a>
                                    <img class="img-fluid" src="{{ asset('frontend/img/list/2.png') }}">
                                    <h6>Sandwiches</h6>
                                    <small>$260</small>
                                </div>
                            </div>
                            <div class="item">
                                <div class="mall-category-item position-relative">
                                    <a class="btn btn-primary btn-sm position-absolute" href="#">ADD</a>
                                    <img class="img-fluid" src="img/list/3.png">
                                    <h6>Soups</h6>
                                    <small>$860</small>
                                </div>
                            </div>
                            <div class="item">
                                <div class="mall-category-item position-relative">
                                    <a class="btn btn-primary btn-sm position-absolute" href="#">ADD</a>
                                    <img class="img-fluid" src="img/list/4.png">
                                    <h6>Pizzas</h6>
                                    <small>$602</small>
                                </div>
                            </div>
                            <div class="item">
                                <div class="mall-category-item position-relative">
                                    <a class="btn btn-primary btn-sm position-absolute" href="#">ADD</a>
                                    <img class="img-fluid" src="img/list/5.png">
                                    <h6>Pastas</h6>
                                    <small>$360</small>
                                </div>
                            </div>
                            <div class="item">
                                <div class="mall-category-item position-relative">
                                    <a class="btn btn-primary btn-sm position-absolute" href="#">ADD</a>
                                    <img class="img-fluid" src="img/list/6.png">
                                    <h6>Chinese</h6>
                                    <small>$760</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2"></div>
                    <div class="p-4 mb-4 bg-white rounded shadow-sm">
                        <h4 class="mb-1">Choose a delivery address</h4>
                        <h6 class="mb-3 text-black-50">Multiple addresses in this location</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4 bg-white border card addresses-item border-success">
                                    <div class="p-4 gold-members">
                                        <div class="media">
                                            <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
                                            <div class="media-body">
                                                <h6 class="mb-1 text-black">Home</h6>
                                                <p class="text-black">291/d/1, 291, Jawaddi Kalan, Ludhiana, Punjab
                                                    141002, India
                                                </p>
                                                <p class="mb-0 text-black font-weight-bold"><a
                                                        class="mr-2 btn btn-sm btn-success" href="#"> DELIVER
                                                        HERE</a>
                                                    <span>30MIN</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4 bg-white card addresses-item">
                                    <div class="p-4 gold-members">
                                        <div class="media">
                                            <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>
                                            <div class="media-body">
                                                <h6 class="mb-1 text-secondary">Work</h6>
                                                <p>NCC, Model Town Rd Town, Ludhiana, Punjab 141002, India
                                                </p>
                                                <p class="mb-0 text-black font-weight-bold"><a
                                                        class="mr-2 btn btn-sm btn-secondary" href="#"> DELIVER
                                                        HERE</a>
                                                    <span>40MIN</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bg-white card addresses-item">
                                    <div class="p-4 gold-members">
                                        <div class="media">
                                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                                            <div class="media-body">
                                                <h6 class="mb-1 text-secondary">Other</h6>
                                                <p>Delhi Bypass Rd, Jawaddi Taksal, Ludhiana, Punjab 141002, India
                                                </p>
                                                <p class="mb-0 text-black font-weight-bold"><a
                                                        class="mr-2 btn btn-sm btn-secondary" href="#"> DELIVER
                                                        HERE</a>
                                                    <span>45MIN</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-white card addresses-item">
                                    <div class="p-4 gold-members">
                                        <div class="media">
                                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                                            <div class="media-body">
                                                <h6 class="mb-1 text-secondary">Other</h6>
                                                <p>Pritm Nagar, Model Town, Ludhiana, Punjab 141002, India
                                                </p>
                                                <p class="mb-0 text-black font-weight-bold"><a data-toggle="modal"
                                                        data-target="#add-address-modal"
                                                        class="mr-2 btn btn-sm btn-primary" href="#"> ADD NEW
                                                        ADDRESS</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2"></div>
                    <div class="p-4 bg-white rounded shadow-sm osahan-payment">
                        <h4 class="mb-1">Choose payment method</h4>
                        <h6 class="mb-3 text-black-50">Credit/Debit Cards</h6>
                        <div class="row">
                            <div class="pr-0 col-sm-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-cash-tab" data-toggle="pill"
                                        href="#v-pills-cash" role="tab" aria-controls="v-pills-cash"
                                        aria-selected="false"><i class="icofont-money"></i> Pay on Delivery</a>
                                    <a class="nav-link " id="v-pills-home-tab" data-toggle="pill"
                                        href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true"><i class="icofont-credit-card"></i> Credit/Debit
                                        Cards</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><i class="icofont-id-card"></i> Food Cards</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false"><i class="icofont-bank-alt"></i> Netbanking</a>

                                </div>
                            </div>
                            <div class="pl-0 col-sm-8">
                                <div class="tab-content h-100" id="v-pills-tabContent">
                                    
                                    <div class="tab-pane fade show active" id="v-pills-cash" role="tabpanel"
                                        aria-labelledby="v-pills-cash-tab">
                                        <h6 class="mt-0 mb-3">Cash</h6>
                                        <p>Please keep exact change handy to help us serve you better</p>
                                        <hr>
                                        <form>
                                            <a href="thanks.html" class="btn btn-success btn-block btn-lg">PAY
                                                @if (Session::has('coupon'))
                                                    {{ Session::get('coupon')['total_amount'] }}
                                                @else
                                                    {{ $total }}
                                                @endif
                                                <i class="icofont-long-arrow-right"></i></a>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <h6 class="mt-0 mb-3">Add new card</h6>
                                        <p>WE ACCEPT <span class="osahan-card">
                                                <i class="icofont-visa-alt"></i> <i
                                                    class="icofont-mastercard-alt"></i>
                                                <i class="icofont-american-express-alt"></i> <i
                                                    class="icofont-payoneer-alt"></i> <i
                                                    class="icofont-apple-pay-alt"></i> <i
                                                    class="icofont-bank-transfer-alt"></i> <i
                                                    class="icofont-discover-alt"></i> <i class="icofont-jcb-alt"></i>
                                            </span>
                                        </p>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4">Card number</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                            placeholder="Card number">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                id="button-addon2"><i
                                                                    class="icofont-card"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Valid through(MM/YY)
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Valid through(MM/YY)">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>CVV
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter CVV Number">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Name on card
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Card number">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck1">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">Securely
                                                            save this card for a faster checkout next time.</label>
                                                    </div>
                                                </div>
                                                <div class="mb-0 form-group col-md-12">
                                                    <a href="thanks.html" class="btn btn-success btn-block btn-lg">PAY
                                                        @if (Session::has('coupon'))
                                                            {{ Session::get('coupon')['total_amount'] }}
                                                        @else
                                                            {{ $total }}
                                                        @endif
                                                        <i class="icofont-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <h6 class="mt-0 mb-3">Add new food card</h6>
                                        <p>WE ACCEPT <span class="osahan-card">
                                                <i class="icofont-sage-alt"></i> <i class="icofont-stripe-alt"></i> <i
                                                    class="icofont-google-wallet-alt-1"></i>
                                            </span>
                                        </p>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4">Card number</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                            placeholder="Card number">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                id="button-addon2"><i
                                                                    class="icofont-card"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Valid through(MM/YY)
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Valid through(MM/YY)">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>CVV
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter CVV Number">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Name on card
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Card number">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck1">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">Securely
                                                            save this card for a faster checkout next time.</label>
                                                    </div>
                                                </div>
                                                <div class="mb-0 form-group col-md-12">
                                                    <a href="thanks.html" class="btn btn-success btn-block btn-lg">PAY
                                                        @if (Session::has('coupon'))
                                                            {{ Session::get('coupon')['total_amount'] }}
                                                        @else
                                                            {{ $total }}
                                                        @endif
                                                        <i class="icofont-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <h6 class="mt-0 mb-3">Netbanking</h6>
                                        <form>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active">
                                                    <input type="radio" name="options" id="option1"
                                                        autocomplete="off" checked> HDFC <i
                                                        class="icofont-check-circled"></i>
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="options" id="option2"
                                                        autocomplete="off">
                                                    ICICI <i class="icofont-check-circled"></i>
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="options" id="option3"
                                                        autocomplete="off">
                                                    AXIS <i class="icofont-check-circled"></i>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Select Bank
                                                    </label>
                                                    <br>
                                                    <select class="custom-select form-control">
                                                        <option selected>Bank</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="mb-0 form-group col-md-12">
                                                    <a href="thanks.html" class="btn btn-success btn-block btn-lg">PAY
                                                        @if (Session::has('coupon'))
                                                            {{ Session::get('coupon')['total_amount'] }}
                                                        @else
                                                            {{ $total }}
                                                        @endif
                                                        <i class="icofont-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 mb-4 rounded shadow-sm generator-bg osahan-cart-item">
                    <div class="mb-4 d-flex osahan-cart-item-profile">
                        <img class="mr-3 img-fluid rounded-pill" alt="osahan"
                            src="{{ asset('upload/clients/' . $client->profile_photo_path) }}">
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-white">{{ $client->name }}
                            </h6>
                            <p class="mb-0 text-white"><i class="icofont-location-pin"></i> {{ $client->address }},
                                NEW NY
                                10029</p>
                        </div>
                    </div>
                    <div class="p-4 mb-4 ">
                        <h5 class="mb-1 text-white">Your Order</h5>
                        <p class="mb-4 text-white">{{ count((array) Session::get('cart')) }} ITEMS</p>

                        <div class="mb-2 bg-white rounded shadow-sm">
                            @php
                                $total = 0;
                            @endphp
                            @if (Session::has('cart'))
                                @foreach (Session::get('cart') as $id => $details)
                                    @php
                                        $total += $details['price'] * $details['quantity'];
                                    @endphp

                                    <div class="p-2 gold-members border-bottom">

                                        <p class="float-right mb-0 ml-2 text-gray">
                                            {{ $details['price'] * $details['quantity'] }}
                                        </p>
                                        <span class="float-right count-number">


                                            <button class="btn btn-outline-secondary btn-sm left dec"
                                                data-id="{{ $id }}"> <i class="icofont-minus"></i>
                                            </button>

                                            <input class="count-number-input" type="text"
                                                value="{{ $details['quantity'] }}" readonly="">

                                            <button class="btn btn-outline-secondary btn-sm right inc"
                                                data-id="{{ $id }}"> <i class="icofont-plus"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm right remove"
                                                data-id="{{ $id }}"> <i class="icofont-trash"></i>
                                            </button>
                                        </span>
                                        <div class="media">
                                            <div class="mr-2"><img class="img-fluid"
                                                    src="{{ asset('upload/products/' . $details['image']) }}"
                                                    style="width: 30px;">
                                            </div>
                                            <div class="media-body">
                                                <p class="mt-1 mb-0 text-black">{{ $details['name'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        {{-- coupon apply --}}
                        @if (Session::has('coupon'))
                            <div class="clearfix p-2 mb-2 bg-white rounded">
                                <p class="mb-1">Item Total <span
                                        class="float-right text-dark">{{ count((array) Session::get('cart')) }}
                                        Items</span>
                                </p>
                                <p class="mb-1">Restaurant Coupon Name <span class="float-right text-dark"
                                        id="removeCoupon">{{ Session::get('coupon')['coupon_name'] }} </span>
                                    <a type="submit" class="float-right text-danger" onclick="RemoveCoupon()"><i
                                            class="icofont-ui-delete"></i></a>
                                </p>


                                <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip"
                                        data-placement="top" title="Total discount breakup">
                                        <i class="icofont-info-circle"></i>
                                    </span> <span class="float-right text-dark">{{ 'Next Time Adding' }}</span>
                                </p>
                                <p class="mb-1 text-success">Total Discount
                                    <span
                                        class="float-right text-success">{{ Session::get('coupon')['discount_amount'] }}</span>
                                </p>
                                <hr />
                                <h6 class="mb-0 font-weight-bold">TO PAY <span class="float-right">
                                        @if (Session::has('coupon'))
                                            {{ Session::get('coupon')['total_amount'] }}
                                        @else
                                            {{ $total }}
                                        @endif
                                    </span>
                                </h6>
                            </div>
                        @else
                            <div class="clearfix p-2 mb-2 bg-white rounded">
                                <div class="mb-2 input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Enter promo code"
                                        id="coupon_name">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="button-addon2"
                                            onclick="ApplyCoupon()"><i class="icofont-sale-discount"></i>
                                            APPLY</button>
                                    </div>
                                </div>

                            </div>
                        @endif


                        {{--
                        <pre id="demo">{{print_r(Session::get('coupon'),true)}}</pre> --}}
                        {{-- end coupon --}}


                        <div class="clearfix p-2 mb-2 bg-white rounded">
                            <img class="float-left img-fluid" src="{{ asset('frontend/img/wallet-icon.png') }}">
                            <h6 class="mb-2 text-right font-weight-bold">Subtotal : <span class="text-danger">
                                    @if (Session::has('coupon'))
                                        {{ Session::get('coupon')['total_amount'] }}
                                    @else
                                        {{ $total }}
                                    @endif
                                </span>
                            </h6>
                            <p class="mb-1 text-right seven-color">Extra charges may apply</p>

                        </div>

                        <a href="{{ route('checkout') }}" class="btn btn-success btn-block btn-lg">TO PAY <i
                                class="icofont-long-arrow-right"></i></a>
                    </div>
                    <div class="pt-2"></div>
                    <div class="pt-2 text-center">
                        <img class="img-fluid" src="https://dummyimage.com/352x504/ccc/ffffff.png&text=Google+ads">
                    </div>
                </div>
            </div>
        </div>
</section>
{{-- --------------------------------- --}}
<section class="pt-5 pb-5 text-center bg-white section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="m-0">Operate food store or restaurants? <a href="login.html">Work With Us</a></h5>
            </div>
        </div>
    </div>
</section>
{{-- ------------------------------------------- --}}
<section class="pt-5 pb-5 footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12 col-sm-12">
                <h6 class="mb-3">Subscribe to our Newsletter</h6>
                <form class="mb-1 newsletter-form">
                    <div class="input-group">
                        <input type="text" placeholder="Please enter your email" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
                <p><a class="text-info" href="register.html">Register now</a> to get updates on <a
                        href="offers.html">Offers and Coupons</a></p>
                <div class="app">
                    <p class="mb-2">DOWNLOAD APP</p>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('frontend/img/google.png') }}">
                    </a>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('frontend/img/apple.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-md-1 col-sm-6 mobile-none">
            </div>
            <div class="col-md-2 col-4 col-sm-4">
                <h6 class="mb-3">About OE</h6>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Culture</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-4 col-sm-4">
                <h6 class="mb-3">For Foodies</h6>
                <ul>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Developers</a></li>
                    <li><a href="#">Blogger Help</a></li>
                    <li><a href="#">Verified Users</a></li>
                    <li><a href="#">Code of Conduct</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-4 col-sm-4">
                <h6 class="mb-3">For Restaurants</h6>
                <ul>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Add a Restaurant</a></li>
                    <li><a href="#">Claim your Listing</a></li>
                    <li><a href="#">For Businesses</a></li>
                    <li><a href="#">Owner Guidelines</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- ---------------------------------------------------- --}}
<section class="pt-5 pb-5 bg-white footer-bottom-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-black">POPULAR COUNTRIES</p>
                <div class="search-links">
                    <a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> |
                    <a href="#">Chile</a>
                    | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a
                        href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New
                        Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a
                        href="#">Philippines</a> | <a href="#">Sri Lanka</a> | <a
                        href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> |
                    <a href="#">Chile</a>
                    | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a
                        href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New
                        Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a
                        href="#">Philippines</a> | <a href="#">Sri Lanka</a><a
                        href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> |
                    <a href="#">Chile</a>
                    | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a
                        href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New
                        Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a
                        href="#">Philippines</a> | <a href="#">Sri Lanka</a> | <a
                        href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> |
                    <a href="#">Chile</a>
                    | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a
                        href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New
                        Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a
                        href="#">Philippines</a> | <a href="#">Sri Lanka</a>
                </div>
                <p class="mt-4 text-black">POPULAR FOOD</p>
                <div class="search-links">
                    <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street
                        Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a
                        href="#">Cafe</a> | <a href="#">South
                        Indian</a> | <a href="#">Punjabi Food</a> | <a href="#">Fast Food</a> | <a
                        href="#">Chinese</a>
                    | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a
                        href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> |
                    <a href="#">Punjabi Food</a><a href="#">Fast
                        Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a
                        href="#">Continental</a> |
                    <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> |
                    <a href="#">Punjabi
                        Food</a> | <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a
                        href="#">Street Food</a> |
                    <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> |
                    <a href="#">South
                        Indian</a> | <a href="#">Punjabi Food</a>
                </div>
            </div>
        </div>
    </div>
</section>



@include('frontend.dashboard.footer')
