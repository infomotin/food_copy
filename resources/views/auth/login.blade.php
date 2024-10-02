
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
                          <h3 class="mb-4 login-heading">Welcome back!</h3>
                          <form method="POST" action="{{ route('login') }}">
                            @csrf
                             <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address">
                                <label for="inputEmail">Email address </label>
                             </div>
                             <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                                <label for="inputPassword">Password</label>
                             </div>
                             <div class="mb-3 custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                             </div>
                             <button class="mb-2 btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold" type="submit">Sign in</button>
                             <div class="pt-3 text-center">
                                Don’t have an account? <a class="font-weight-bold" href="{{route('register')}}">Sign Up</a>
                             </div>
                          </form>
                          <hr class="my-4">
                          <p class="text-center">LOGIN WITH</p>
                          <div class="row">
                             <div class="pr-2 col">
                                <button class="pl-1 pr-1 text-white btn btn-lg btn-google font-weight-normal btn-block text-uppercase" type="submit"><i class="mr-2 fab fa-google"></i> Google</button>
                             </div>
                             <div class="pl-2 col">
                                <button class="pl-1 pr-1 text-white btn btn-lg btn-facebook font-weight-normal btn-block text-uppercase" type="submit"><i class="mr-2 fab fa-facebook-f"></i> Facebook</button>
                             </div>
                          </div>
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
