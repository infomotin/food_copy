<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Osahan Eat - Online Food Ordering Website HTML Template</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="{{asset('frontend/img/favicon.png')}}">
      <!-- Bootstrap core CSS-->
      <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="{{asset('frontend/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="{{asset('frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
      <!-- Select2 CSS-->
      <link href="{{asset('frontend/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="{{asset('frontend/css/osahan.css')}}" rel="stylesheet">
   </head>
   <body class="bg-white">
      <div class="container-fluid">
         <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
               <div class="py-5 login d-flex align-items-center">
                  <div class="container">
                     <div class="row">
                        <div class="pl-5 pr-5 mx-auto col-md-9 col-lg-8">
                           <h3 class="mb-4 login-heading">New Buddy!</h3>
                           <form  method="POST" action="{{ route('register') }}">
                              @csrf
                              <div class="form-label-group">
                                <input type="text" id="inputEmail" name="name" class="form-control" placeholder="Enter Your Name">
                                <label for="inputEmail">Your Name</label>
                             </div>
                              <div class="form-label-group">
                                 <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address">
                                 <label for="inputEmail">Email address / Mobile</label>
                              </div>
                              <div class="form-label-group">
                                 <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                                 <label for="inputPassword">Password</label>
                              </div>
                              <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password_confirmation" class="form-control" placeholder="password confirmation">
                                <label for="inputPassword">Confirm Password</label>
                             </div>
                              <button class="mb-2 btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold" type="submit">Sign Up</button>
                              <div class="pt-3 text-center">
                                 Already have an Account? <a class="font-weight-bold" href="{{route('login')}}">Sign In</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{asset('frontend/vendor/jquery/jquery-3.3.1.slim.min.js')}}"></script>
      <!-- Bootstrap core JavaScript-->
      <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Select2 JavaScript-->
      <script src="{{asset('frontend/vendor/select2/js/select2.min.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('frontend/js/custom.js')}}"></script>
   </body>
</html>
