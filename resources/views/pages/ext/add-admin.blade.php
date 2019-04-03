@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Daftarkan Admin
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('admin.index') }}">Admin</a></li>
            <li class="active">Daftarkan Admin</li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'AdminController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::text ('name','',['class'=>'form-control float-right','placeholder'=>'Masukkan Nama'])}}
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('email','E-Mail',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::email ('email','',['class'=>'form-control','placeholder'=>'Masukkan Email'])}}
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
            <br>
            {{Form::submit('Daftarkan',['class'=>'btn btn-success'])}}
            <a href="{{ route('admin.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
