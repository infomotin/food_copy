@php
$userData = Auth::user();
// $profileData = App\Models\User::find($userData->id);
@endphp
<nav class="navbar navbar-expand-lg navbar-dark osahan-nav">
   <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><img alt="logo" src="{{asset('frontend/img/favicon.png')}}"> Dazzle
         Demo </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
         aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="ml-auto navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="offers.html"><i class="icofont-sale-discount"></i> Offers <span
                     class="badge badge-warning">New</span></a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  Restaurants
               </a>
               <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="listing.html">Listing</a>
                  <a class="dropdown-item" href="detail.html">Detail + Cart</a>
                  <a class="dropdown-item" href="checkout.html">Checkout</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  Pages
               </a>
               <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="track-order.html">Track Order</a>
                  <a class="dropdown-item" href="invoice.html">Invoice</a>
                  @if (Auth::user())
                  <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                  @else
                  <a class="dropdown-item" href="{{route('login')}}">Login</a>
                  @endif
                  @if(!Auth::user())
                  <a class="dropdown-item" href="{{route('register')}}">Register</a>
                  @endif
                  <a class="dropdown-item" href="404.html">404</a>
                  <a class="dropdown-item" href="{{url('/')}}">Extra :)</a>
               </div>
            </li>

            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <img alt="Generic placeholder image"
                     src="{{(!empty($userData->profile_photo_path))?url('upload/users/'.$userData->profile_photo_path):url('upload/no_image.jpg')}}"
                     class="nav-osahan-pic rounded-pill"> My Account
               </a>
               <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right">

                  <a class="dropdown-item" href="{{route('dashboard')}}"><i class="icofont-sale-discount"></i>
                     Dashboard</a>
                  <a class="dropdown-item" href="{{route('user.logout')}}"><i class="icofont-heart"></i>
                     logout</a>

               </div>
            </li>
            <li class="nav-item dropdown dropdown-cart">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="fas fa-shopping-basket"></i> Cart
                  <span class="badge badge-success">5</span>
               </a>
               <div class="p-0 border-0 shadow-sm dropdown-menu dropdown-cart-top dropdown-menu-right">
                  <div class="p-4 dropdown-cart-top-header">
                     <img class="mr-3 img-fluid" alt="osahan" src="img/cart.jpg">
                     <h6 class="mb-0">Gus's World Famous Chicken</h6>
                     <p class="mb-0 text-secondary">310 S Front St, Memphis, USA</p>
                     <small><a class="text-primary font-weight-bold" href="#">View Full Menu</a></small>
                  </div>
                  <div class="p-4 dropdown-cart-top-body border-top">
                     <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30
                        cm) x 1 <span class="float-right text-secondary">$314</span></p>
                     <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Corn & Peas Salad x 1 <span
                           class="float-right text-secondary">$209</span></p>
                     <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Veg Seekh Sub 6" (15 cm) x
                        1 <span class="float-right text-secondary">$133</span></p>
                     <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30
                        cm) x 1 <span class="float-right text-secondary">$314</span></p>
                     <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Corn & Peas Salad x 1 <span
                           class="float-right text-secondary">$209</span></p>
                  </div>
                  <div class="p-4 dropdown-cart-top-footer border-top">
                     <p class="mb-0 font-weight-bold text-secondary">Sub Total <span
                           class="float-right text-dark">$499</span></p>
                     <small class="text-info">Extra charges may apply</small>
                  </div>
                  <div class="p-2 dropdown-cart-top-footer border-top">
                     <a class="btn btn-success btn-block btn-lg" href="checkout.html"> Checkout</a>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </div>
</nav>