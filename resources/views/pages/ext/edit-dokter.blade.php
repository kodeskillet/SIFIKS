@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('doctor.index') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Edit Dokter
            <small><b>( {{$data['doctor']->name}} )</b></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('doctor.index') }}">Dokter</a></li>
            <li class="active">Edit Dokter</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => ['DoctorController@update', $data['doctor']->id],'method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                        {{Form::text ('name',$data['doctor']->name,['class'=>'form-control float-right'])}}
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
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
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
            <a href="{{ route('doctor.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
