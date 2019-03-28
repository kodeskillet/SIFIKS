@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('hospital.show', $data['hospital']->id) }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Edit Kamar
            <small><b>( {{ $data['room']->name }} )</b></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fas fa-tachometer-alt"></i>{{ session('role') }}</a></li>
            <li><a href="{{ route('hospital.index') }}">Rumah Sakit</a></li>
            <li><a href="{{ route('hospital.show', ['id' => $data['hospital']->id]) }}">{{ $data['hospital']->name }}</a></li>
            <li>Edit Kamar<small>({{ $data['room']->id }})</small></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => ['RoomController@update', $data['room']->id],'method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama Kamar',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::text ('name',$data['room']->name,['class'=>'form-control float-right'])}}
                    @if($errors->has('name'))
                        <div class="text-danger text-bold">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('price','Harga per malam(Rp.)',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::number ('price',$data['room']->price_per_night,['class'=>'form-control float-right'])}}
                    @if($errors->has('price'))
                        <div class="text-danger text-bold">
                            {{$errors->first('price')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {{Form::label ('description','Deskripsi Kamar')}}
                {{Form::textarea('description', $data['room']->description, ['id' => 'ckmini1', 'class' => 'form-control'])}}
                @if($errors->has('description'))
                    <div class="text-danger text-bold">
                        {{$errors->first('description')}}
                    </div>
                @endif
            </div>
            {{Form::hidden('hospital_id', $data['hospital']->id)}}
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
            <a href="{{ route('doctor.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
