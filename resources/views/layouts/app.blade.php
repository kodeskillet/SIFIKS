<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIFIKS</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('include.navbar')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="container">
        @yield('content1')
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
