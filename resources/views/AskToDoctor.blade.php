@extends('layouts.app')
    <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
@include('layouts.inc.navbar')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <br>
                <div class="box box-widget collapsed-box">
                    <div class="box-header with-border">
                    <!-- /.user-block -->
                    <a href="" class="btn btn-primary" data-widget="collapse"><i class="fa fa-edit"></i>Buat Pertanyaan</a>
                    <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            <label>Topic</label>
                            <input type="text" class="form-control" placeholder="Enter Topic">
                        </div>
                        <div class="form-group">
                        {{Form::textarea ('content','',['class' => ['ckeditor', 'form-control'], 'placeholder' => 'Masukkan Konten'])}}
                        </div>
                        {{Form::submit('Kirim',['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <hr>
                <br>
                <h2>Diskusi Kesehatan Terbaru</h2>
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="/bower_components/admin-lte/dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">5 mins ago</span>

                        </div>
                    <!-- /.user-block -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- post text -->
                        <a href="/ask-detail"><h5>Lorem ipsum</h5></a>
                        <p>Far far away, behind the word mountains, far from the
                            countries Vokalia and Consonantia, there live the blind
                            texts. Separated they live in Bookmarksgrove right at</p>

                        <!-- Social sharing buttons -->
                        <span class="pull-right text-muted">1 Answered</span>
                        <span><i class="fa fa-check-circle " style="color:blue"></i> Answered by :</span>
                        <!-- <span class="pull-right text-muted">1 Answered</span> -->
                    </div>
                    <hr>
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="/bower_components/admin-lte/dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">7:30 PM Today</span>
                        </div>
                     <!-- /.user-block -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- post text -->
                        <a href="/ask-detail"><h5>Lorem ipsum</h5></a>
                        <p>the coast of the Semantics, a large language ocean.
                            A small river named Duden flows by their place and supplies
                            it with the necessary regelialia. It is a paradisematic
                            country, in which roasted parts of sentences fly into
                            your mouth.</p>

                        <!-- Social sharing buttons -->
                        <span class="pull-right text-muted">0 Answered</span>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
            <a href="https://ibb.co/jVBG2xT"><img src="https://i.ibb.co/7g8V5TX/health.png" alt="health" border="0"width="350"></a>
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
