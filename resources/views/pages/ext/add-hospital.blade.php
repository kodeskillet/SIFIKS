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
            <li><a href="/admin"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('hospital.index') }}">Rumah Sakit</a></li>
            <li class="active">Tambah Rumah Sakit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'HospitalController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama Rumah Sakit',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-6">
                    {{Form::text ('name','',['class'=>'form-control float-right','placeholder'=>'E.g. RS. Lavalette'])}}
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
                    {{Form::textarea ('address','',['class'=>'form-control','placeholder'=>'E.g. Jl.Kalimosodo 12 No. 9', 'rows' => 3])}}
                    @if($errors->has('address'))
                        <div class="text-danger">
                            {{$errors->first('address')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {{Form::label ('biography','Biografi')}}
                {{Form::textarea('biography','',['class'=> ['ckdefault', 'form-control']])}}
                @if($errors->has('biography'))
                    <div class="text-danger">
                        {{$errors->first('biography')}}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label ('medical_services','Pelayanan Kesehatan')}}
                    {{Form::textarea ('medical_services','',['id' => 'ckmini1', 'class' => ['form-control']])}}
                    @if($errors->has('medical_services'))
                        <div class="text-danger">
                            {{$errors->first('medical_services')}}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    {{Form::label ('public_services','Pelayanan Publik')}}
                    {{Form::textarea ('public_services','',['id' => 'ckmini2', 'class' => ['form-control']])}}
                    @if($errors->has('public_services'))
                        <div class="text-danger">
                            {{$errors->first('public_services')}}
                        </div>
                    @endif
                </div>
            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            <a href="{{ route('hospital.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
