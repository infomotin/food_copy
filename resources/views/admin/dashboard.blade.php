<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>

    @if (Session::has('success'))
    <div class="alert alert-success">
        <li class="text">{{ Session::get('success') }}</li>

    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">
        <li class="text">{{ Session::get('error') }}</li>

    </div>
    @endif
     <a href="{{route('admin.logout') }}">logout </a>

</body>

</html>
