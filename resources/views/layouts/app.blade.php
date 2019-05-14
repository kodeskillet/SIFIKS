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
    <link rel="icon" href="{{ asset("favicon.ico") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <meta name="google-site-verification" content="PyC0pXe33ZPfpV21Stl6oekQ0As-vXhFma4_ix9VWhs" />
    <meta name="description" content="SIFIKS merupakan sebuah aplikasi berbasis website yang menyediakan layanan terhadap kesehatan, mulai dari konsultasi kesehatan, pencarian rumah sakit, sampai dengan pencarian dokter. Yang tentunya akan di layani oleh para ahli di bidangnya.">
    <meta name="keywords" content="SIFIKS, Sifiks, sifiks, kesehatan, medis, penyakit, dokter, rumah sakit, sakit, diskusi kesehatan, tanya dokter, informasi kesehatan">
    <meta name="distribution" content="global">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139040929-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-139040929-1');
    </script>
</head>
<body>
    <div class="loading-box" id="loading">
        <img class="loading-img" src="{{ asset('storage/images/loading.gif') }}">
    </div>

    <div id="bodyContent" style="display: none">
        @yield('content')
        <footer class="foot">
            <p class="text-center">Copyright © 2019 <a href="https://flying-coders.github.io/" target="_blank">Flying Coders</a></p>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#loading').fadeOut( function() {
                $('#bodyContent').fadeIn();
            });
        })

        $(document).ready(() => {
            $('*').tooltip();
        });
    </script>

</body>
</html>
