@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('hospital.index') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Tambah Rumah Sakit
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('hospital.index') }}">Rumah Sakit</a></li>
            <li class="active">Tambah Rumah sakit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'HospitalController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama Rumah Sakit',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                        {{Form::text ('name','',['class'=>'form-control float-right','placeholder'=>'Ex:RS.Lavalette'])}}
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('city_id','Kota',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{ Form::select(
                        'city_id',
                        $city_id,
                        null, [
                            'class' => 'form-control',
                            'placeholder' => 'Pilih Kota'
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
                {{Form::label ('address','Alamat',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{Form::text ('address','',['class'=>'form-control','placeholder'=>'Ex:Jl.Kalimosodo 12 no 9'])}}
                        @if($errors->has('address'))
                            <div class="text-danger">
                                {{$errors->first('address')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('biography','Biografi',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                        {{Form::text('biography','',['class'=>'form-control float-right','placeholder'=>'Silahkan masukkan biografi rumah sakit'])}}
                        @if($errors->has('biography'))
                            <div class="text-danger">
                                {{$errors->first('biography')}}
                            </div>
                        @endif
                </div>
            </div>
            <div class="form-group">
                {{Form::label ('medical_services','Pelayanan Kesehatan',['class'=>'col-md-2 col-form-label text-md-right'])}}
                {{Form::textarea ('medical_services','',['class'=>'form-control'])}}
                    @if($errors->has('medical_services'))
                        <div class="text-danger">
                            {{$errors->first('medical_services')}}
                        </div>
                    @endif
            </div>
            <div class="form-group">
                {{Form::label ('public_services','Pelayanan Publik',['class'=>'col-md-2 col-form-label text-md-right'])}}
                {{Form::textarea ('public_services','',['class'=>'form-control'])}}
                    @if($errors->has('public_services'))
                        <div class="text-danger">
                            {{$errors->first('public_services')}}
                        </div>
                    @endif
            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            <a href="{{ route('hospital.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
