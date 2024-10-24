@php
    $userData = Auth::user();
    // $profileData = App\Models\User::find($userData->id);
@endphp
<nav class="navbar navbar-expand-lg navbar-dark osahan-nav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img alt="logo"
                src="{{ asset('frontend/img/favicon.png') }}"> Dazzle
            Demo </a>
            <p>front</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="ml-auto navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="offers.html"><i class="icofont-sale-discount"></i> Offers <span
                            class="badge badge-warning">New</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Restaurants
                    </a>
                    <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="listing.html">Listing</a>
                        <a class="dropdown-item" href="detail.html">Detail + Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">

                        @if (Auth::user())
                            <a class="dropdown-item" href="track-order.html">Track Order</a>
                            <a class="dropdown-item" href="invoice.html">Invoice</a>
                            <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endif
                        @if (!Auth::user())
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        @endif

                        <a class="dropdown-item" href="{{ url('/') }}">Extra :)</a>
                    </div>
                </li>
                @if (Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img alt="Generic placeholder image"
                                src="{{ !empty($userData->profile_photo_path) ? url('upload/users/' . $userData->profile_photo_path) : url('upload/no_image.jpg') }}"
                                class="nav-osahan-pic rounded-pill"> My Account
                        </a>
                        <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="{{ route('dashboard') }}"><i
                                    class="icofont-sale-discount"></i>
                                Dashboard</a>
                            <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="icofont-heart"></i>
                                logout</a>

                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="icofont-user"></i> My Account
                        </a>
                        <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('register') }}"><i class="icofont-heart"></i>
                                Register</a>
                            <a class="dropdown-item" href="{{ route('login') }}"><i class="icofont-heart"></i>
                                login</a>
                        </div>

                    </li>
                @endif

                @php
                        $total = 0;
                        $cart = Session::get('cart', []);
                        $groupCart = [];
                        foreach ($cart as $id => $details) {
                            $groupCart[$details['client_id']][] = $details;
                        }
                        $clients = App\Models\Client::whereIn('id', array_keys($groupCart))->get()->keyBy('id');
                    @endphp
                    <li class="nav-item dropdown dropdown-cart">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-basket"></i> Cart
                            <span class="badge badge-success">{{ count((array) Session::get('cart')) }}</span>
                        </a>

                        {{-- <pre id="demo">{{ print_r(Session::get('cart'), true) }}</pre> --}}


                        <div class="p-0 border-0 shadow-sm dropdown-menu dropdown-cart-top dropdown-menu-right">
                            @foreach ($groupCart as $clientId => $clientCart)
                                @if (isset($clients[$clientId]))
                                    @php
                                        $client = $clients[$clientId];
                                    @endphp
                                    <div class="p-4 dropdown-cart-top-header">
                                        <img class="mr-3 img-fluid" alt="{{ $client['name'] }}"
                                            src="{{ asset('upload/clients/' . $client['profile_photo_path']) }}">
                                        <h6 class="mb-0">{{ $client['name'] }}</h6>
                                        <p class="mb-0 text-secondary">{{ $client['address'] }}</p>
                                        <small><a class="text-primary font-weight-bold" href="#">View Full
                                                Menu</a></small>
                                    </div>
                                @endif
                            @endforeach


                            <div class="p-4 dropdown-cart-top-body border-top">
                                @php
                                    $total = 0;
                                @endphp
                                @if (Session::has('cart'))
                                    @foreach (Session::get('cart') as $id => $details)
                                        @php
                                            $total += $details['price'] * $details['quantity'];
                                        @endphp
                                        <p class="mb-2">
                                            <img class=" md-2 img-fluid"
                                                src="{{ asset('upload/products/' . $details['image']) }}"
                                                style="width: 30px;">
                                            {{ $details['name'] }} x {{ $details['quantity'] }}
                                            <span
                                                class="float-right text-secondary">${{ $details['price'] * $details['quantity'] }}</span>
                                            </span>
                                        </p>
                                    @endforeach
                                @endif
                                @if (Session::has('coupon'))
                                <div class="p-4 dropdown-cart-top-footer border-top">
                                    <p class="mb-1 text-success">Applied Coupon
                                        <span
                                            class="float-right text-success">{{ Session::get('coupon')['coupon_name'] }}</span>
                                    </p>
                                    <p class="mb-1 text-success">Total Discount
                                        <span
                                            class="float-right text-success">{{ Session::get('coupon')['discount_amount'] }}</span>
                                    </p>
                                    <p class="mb-0 font-weight-bold text-secondary">Sub Total <span
                                            class="float-right text-dark">{{ Session::get('coupon')['total_amount'] }}</span>
                                    </p>

                                </div>
                                <div class="p-2 dropdown-cart-top-footer border-top">
                                    <a class="btn btn-success btn-block btn-lg" href="{{ route('checkout') }}"> Checkout</a>
                                </div>
                            @else
                                <div class="p-4 dropdown-cart-top-footer border-top">
                                    <p class="mb-1 text-success">Total Discount
                                        <span class="float-right text-success">{{ 'No discout' }}</span>
                                    </p>
                                    <p class="mb-0 font-weight-bold text-secondary">Sub Total <span
                                            class="float-right text-dark">${{ $total }}</span></p>

                                </div>
                                <div class="p-2 dropdown-cart-top-footer border-top">
                                    <a class="btn btn-success btn-block btn-lg" href="{{ route('checkout') }}"> Checkout</a>
                                </div>
                            @endif




                            </div>
                        </div>
                    </li>


            </ul>
        </div>
    </div>
</nav>
