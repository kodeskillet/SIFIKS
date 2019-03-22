@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('admin-admin') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Buat Artikel
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('admin-admin') }}">Admin</a></li>
            <li class="active">Tambah Admin</li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'AdminController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Username',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::text ('name','',['class'=>'form-control','placeholder'=>'Masukkan Username'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('email','E-Mail',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::email ('email','',['class'=>'form-control','placeholder'=>'Masukkan Email'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('password','Password',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::password ('password',['class'=>'form-control','placeholder'=>'**********'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('password_confirmation','Ulangi Password',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                        {{Form::password ('password_confirmation',['class'=>'form-control','placeholder'=>'**********'])}}
                </div>
            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            <a href="{{ route('admin-admin') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
