@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('specialty.index') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Tambah Spesialis
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li><a href="{{ route('doctor.index') }}">Dokter</a></li>
            <li><a href="{{ route('doctor.create') }}">Tambah Dokter</a></li>
            <li><a href="{{ route('specialty.index') }}">Spesialis</a></li>
            <li class="active">Tambah Spesialis</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'SpecializationController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('degree','Gelar',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::text ('degree','',['class'=>'form-control float-right','placeholder'=>'Masukkan nama gelar'])}}
                    @if($errors->has('degree'))
                        <div class="text-danger">
                            {{$errors->first('degree')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('name','Nama Spesialis',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{Form::text ('name','',['class'=>'form-control','placeholder'=>'Masukkan nama gelar'])}}
                    @if($errors->has('name'))
                        <div class="text-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {{Form::label ('detail','Detil Spesialis')}}
                {{Form::textarea ('detail','',['class' => ['form-control', 'ckeditor'],'placeholder' => 'Masukkan detil spesialis'])}}
                @if($errors->has('detail'))
                    <br>
                    <div class="text-danger">
                        {{$errors->first('detail')}}
                    </div>
                @endif
            </div>
            {{Form::submit('Tambah',['class'=>'btn btn-success'])}}
            <a href="{{ route('doctor.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
