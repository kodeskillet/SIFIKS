@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <div class="pull-right clock-box">
                    <span class="clock"></span>
                </div>
                <h3>
                    {!! Auth::guard(session('guard'))->user()->getGreetings() !!}
                    <strong>
                        {{ Auth::guard(session('guard'))->user()->name }}
                    </strong>
                    !
                </h3>
                <i>Awali dengan Doa, Bekerja dengan Semangat, Pulang dengan Selamat, Amiin.</i>
            </div>
            <div class="alert alert-warning alert-dismissible text-center mt-2 mb-2" role="alert" style="margin-top: 20px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa far fa-exclamation-triangle pull-left float-left fa-3x"></i>
                <strong>Peringatan !</strong><br>
                {{ $data['warning'] }}
            </div>
        </div>

    </section>
    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            clockUpdate();
            setInterval(clockUpdate, 1000);
        })

        function clockUpdate() {
            var date = new Date();
            function addZero(x) {
                if (x < 10) {
                    return x = '0' + x;
                } else {
                    return x;
                }
            }

            function twelveHour(x) {
                if (x > 12) {
                    return x = x - 12;
                } else if (x == 0) {
                    return x = 12;
                } else {
                    return x;
                }
            }

            var h = addZero(twelveHour(date.getHours()));
            var m = addZero(date.getMinutes());
            var s = addZero(date.getSeconds());

            $('.clock').text(h + ':' + m + ':' + s)
        }
    </script>
@endsection
