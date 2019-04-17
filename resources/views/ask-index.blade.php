@extends('layouts.app')
<link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">

@section('content')

    @include('layouts.inc.navbar')

    <br>
    <div class="container">
        <div class="row">
            <div class="col col-md-8">

                @include('layouts.inc.messages')

                <div class="nav justify-content-end">
                    <a href="{{ route('user.thread.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-question mr-1"></i>
                        <b>Tanyakan Sesuatu</b>
                    </a>
                </div>
                <hr>
                @include('layouts.inc.recent-thread')
            </div>
            <div class="col col-md-4">
            <img src="https://i.ibb.co/7g8V5TX/health.png" alt="health" border="0"width="350">
            </div>
        </div>
    </div>
    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
    <script src="{{ asset("bower_components/fastclick/lib/fastclick.js") }}"></script>
    <script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
    <script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
    <script src="{{ asset("bower_components/ckeditor/ckeditor.js") }}"></script>
@endsection
