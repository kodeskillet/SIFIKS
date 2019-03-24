@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('admin-doctor') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Tambah Dokter
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('admin-doctor') }}">Dokter</a></li>
            <li class="active">Tambah Dokter</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'AdminController@storedoctor','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                        {{Form::text ('name','',['class'=>'form-control float-right','placeholder'=>'Masukkan nama dokter'])}}
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('city_id','Asal Kota',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{ Form::select(
                        'city_id', [
                            1 => 'Malang',
                            2 => 'Blitar',
                            3 => 'Surabaya'
                        ],
                        null, [
                            'class' => 'form-control',
                            'placeholder' => 'Pilih Kota Asal'
                        ]
                    )}}
                        @if($errors->has('city_id'))
                            <div class="text-danger">
                                {{$errors->first('city_id')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('specialization_id','Spesialis',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{ Form::select(
                        'specialization_id', [
                            1 => 'Penyakit Kelamin',
                            2 => 'Penyakit Dalam',
                            3 => 'Penyakit Umum'
                        ],
                        null, [
                            'class' => 'form-control',
                            'placeholder' => 'Pilih Spesialis'
                        ]
                    )}}
                        @if($errors->has('specialization_id'))
                            <div class="text-danger">
                                {{$errors->first('specialization_id')}}
                            </div>
                        @endif
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
                {{Form::label ('password','Password',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{Form::password ('password',['class'=>'form-control','placeholder'=>'***************'])}}
                        @if($errors->has('password'))
                            <div class="text-danger">
                                {{$errors->first('password')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('password_confirmation','Ulangi Password',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{Form::password ('password_confirmation',['class'=>'form-control','placeholder'=>'***************'])}}
                        @if($errors->has('password_confirmation'))
                            <div class="text-danger">
                                {{$errors->first('password_confirmation')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group">
                {{Form::label ('biography','Biografi',['class'=>'col-md-2 col-form-label text-md-right'])}} {{--HARUS LURUS DENGAN ATASNYA--}}
                {{Form::textarea ('biography','',['class'=>'form-control','placeholder'=>'Masukkan biografi dokter'])}}
                    @if($errors->has('biography'))
                        <div class="text-danger">
                            {{$errors->first('biography')}}
                        </div>
                    @endif

            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            <a href="{{ route('admin-doctor') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
