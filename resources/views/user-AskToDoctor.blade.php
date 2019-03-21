@extends('layouts.app')
    <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}">
@include('layouts.inc.navbar')

@section('content')
    <!-- <div class="container-fluid">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-info">
            <div class="row">
                <div class="col-md-6 px-0">
                    <img src="https://i.ibb.co/JQbV1BQ/sifiks5.png" width="45%" alt="sifiks5" border="0">
                    <p class="lead my-3" >Kekayaan bukan berasal dari uang, melainkan kesehatan</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari SIFIKS" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">Tanya Dokter</button>
                    <button type="button" class="btn btn-primary">Cari Dokter</button>
                    <button type="button" class="btn btn-primary">Cari Rumah Sakit</button>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('storage/images/dokter.jpg') }}" alt="Dokter" class="img-thumbnail float-right" >
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
        <h1>Tanya Dokter</h1>
        <!-- <div class="box box-primary container" style="padding-bottom:20px;"> -->
            <br>
            {!! Form::open(['action' => 'ArticleController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group">
                {{Form::label ('category','Category')}}
                {{ Form::select(
                    'category', [
                        'Illness' => 'Illness',
                        'Medications' => 'Medications',
                        'Living Healthy' => 'Living Healthy',
                        'Family' => 'Family',
                        'Healthy' => 'Healthy'
                    ],
                    null, [
                        'class' => 'form-control',
                        'placeholder' => 'Select a category...'
                    ]
                )}}
            </div>
            <div class="form-group">
                {{Form::label ('title','Title')}}
                {{Form::text ('title','',['class'=>'form-control','placeholder' => 'Masukkan Judul'])}}
            </div>
            <div class="form-group">
                {{Form::label ('content','Content')}}
                {{Form::textarea ('content','',['id'=>'editor1','class'=>'form-control','placeholder' => 'Masukkan Konten'])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            <a href="{{ route('admin-article') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        <!-- </div> -->
    </div>

    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
    <script src="{{ asset("bower_components/fastclick/lib/fastclick.js") }}"></script>
    <script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
    <script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
    <script src="{{ asset("bower_components/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection