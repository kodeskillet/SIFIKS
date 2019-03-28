@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('doctor.index') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Tambah Dokter
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('doctor.index') }}">Dokter</a></li>
            <li class="active">Tambah Dokter</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'DoctorController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::text ('name','',['class'=>'form-control float-right','placeholder'=>'Masukkan nama dokter'])}}
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('specialty','Spesialis',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{ Form::select(
                        'specialty',
                        $specialization,
                        null, [
                            'class' => 'form-control',
                            'placeholder' => 'Pilih Spesialis'
                        ]
                    )}}
                        @if($errors->has('specialty'))
                            <div class="text-danger">
                                {{$errors->first('specialty')}}
                            </div>
                        @endif
                </div>
                <div class="col-md-2">
                    <a href="{{ route('specialty.index') }}" class="btn btn-primary form-control">
                        <i class="fa fa-table"></i>
                        &nbsp;Daftar Spesialis
                    </a>
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('license','Lisensi',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{Form::text ('license','',['class'=>'form-control','placeholder'=>'Masukkan lisensi dokter'])}}
                        @if($errors->has('license'))
                            <div class="text-danger">
                                {{$errors->first('license')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('email','E-Mail',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::email('email','',['class'=>'form-control float-right','placeholder'=>'faurinta@sifiksdoc.com'])}}
                        @if($errors->has('email'))
                            <div class="text-danger">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('password','Password',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::password ('password',['class'=>'form-control','placeholder'=>'&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;'])}}
                        @if($errors->has('password'))
                            <div class="text-danger">
                                {{$errors->first('password')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('password_confirmation','Ulangi Password',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::password ('password_confirmation',['class'=>'form-control','placeholder'=>'&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;'])}}
                        @if($errors->has('password_confirmation'))
                            <div class="text-danger">
                                {{$errors->first('password_confirmation')}}
                            </div>
                        @endif
                </div>
            </div>
            {{Form::submit('Tambah',['class'=>'btn btn-success'])}}
            <a href="{{ route('doctor.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
