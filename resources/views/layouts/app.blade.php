<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        SIFIKS
    </title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@yield('content')

<footer class="foot">
    {{-- <p class="float-right"><a href="#">Back to top</a></p> --}}
    <p class="text-center">Copyright © 2019 <a href="https://flying-coders.github.io/" target="_blank">Flying Coders</a></p>
</footer>

</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
