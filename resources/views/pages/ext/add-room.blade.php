@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('hospital.show', $data['hospital']->id) }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Tambah Kamar
            <small><i class="fa fas fa-arrow-right fa-sm"></i>&nbsp;&nbsp;&nbsp;<b>( {{ $data['hospital']->name }} )</b></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fas fa-tachometer-alt"></i>{{ session('role') }}</a></li>
            <li><a href="{{ route('hospital.index') }}">Rumah Sakit</a></li>
            <li><a href="{{ route('hospital.show', ['id' => $data['hospital']->id]) }}">{{ $data['hospital']->name }}</a></li>
            <li>Tambah Kamar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => ['RoomController@store'],'method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group row">
                {{Form::label ('name','Nama Kamar',['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::text ('name', '', ['class'=>'form-control float-right', 'placeholder' => 'E.g. Kamar Mawar'])}}
                    @if($errors->has('name'))
                        <div class="text-danger text-bold">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{Form::label ('price', 'Harga per malam(Rp.)', ['class'=>'col-md-2 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::number ('price', '', ['class'=>'form-control float-right', 'placeholder' => 'E.g. 500000'])}}
                    @if($errors->has('price'))
                        <div class="text-danger text-bold">
                            {{$errors->first('price')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {{Form::label ('description', 'Deskripsi Kamar')}}
                {{Form::textarea('description', '', ['id' => 'ckmini1', 'class' => 'form-control'])}}
                @if($errors->has('description'))
                    <div class="text-danger text-bold">
                        {{$errors->first('description')}}
                    </div>
                @endif
            </div>
            {{Form::hidden('hospital_id', $data['hospital']->id)}}
            {{Form::submit('Tambahkan',['class'=>'btn btn-success'])}}
            <a href="{{ route('doctor.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
