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
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>{{ session('role') }}</a></li>
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
            <div class="form-group">
                {{Form::label ('category','Category')}}
                {{ Form::select(
                    'category', [
                        'penyakit' => 'Penyakit',
                        'obat' => 'Obat - obatan',
                        'hidup-sehat' => 'Hidup Sehat',
                        'keluarga' => 'Keluarga',
                        'kesehatan' => 'Kesehatan'
                    ],
                    '',
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Select a category...'
                    ]
                )}}
            </div>
            <div class="form-group">
                {{Form::label ('title','Title')}}
                {{Form::text ('title', '', ['class'=>'form-control','placeholder' => 'Masukkan Judul'])}}
            </div>
            <div class="form-group">
                {{Form::label ('content','Content')}}
                {{Form::textarea ('content', '', ['class' => ['form-control', 'ckdefault'],'placeholder' => 'Masukkan Konten'])}}
            </div>
            {{--<div class="form-group">--}}
            {{--{{Form::file('cover_image')}}--}}
            {{--</div>--}}
            {{Form::hidden('hospital_id', $data['hospital']->id)}}
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
            <a href="{{ route('article.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
