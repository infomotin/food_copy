<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body class="container">
    <h1>Login</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger">
        <li class="text">{{ Session::get('error') }}</li>

    </div>
    @endif


    @if (Session::has('success'))
    <div class="alert alert-danger">
        <li class="text">{{ Session::get('success') }}</li>

    </div>
    @endif

    <form method="POST" action="{{ route('admin.reset_password') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
        <a href="#">Register</a>
        <a href="{{ route('admin.login') }}">login</a>
    </form>
</body>

</html>
