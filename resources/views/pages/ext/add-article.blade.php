@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('article.index') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Buat Artikel
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('article.index') }}">Artikel</a></li>
            <li class="active">Buat Artikel</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => 'ArticleController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            {{-- {{Form::hidden('user_id','{{Auth::user()->id}}')}} --}}
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
                    null, [
                        'class' => 'form-control',
                        'placeholder' => 'Select a category...'
                    ]
                )}}
                @if($errors->has('category'))
                <br>
                    <div class="text-danger">
                        {{$errors->first('category')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                {{Form::label ('title','Title')}}
                {{Form::text ('title','',['class'=>'form-control','placeholder' => 'Masukkan Judul'])}}
                @if($errors->has('title'))
                <br>
                    <div class="text-danger">
                        {{$errors->first('title')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                {{Form::label ('content','Content')}}
                {{Form::textarea ('content','',['class'=>['form-control', 'ckdefault'],'placeholder' => 'Masukkan Konten'])}}
                @if($errors->has('content'))
                <br>
                    <div class="text-danger">
                        {{$errors->first('content')}}
                    </div>
                @endif
            </div>
            {{--<div class="form-group">--}}
                {{--{{Form::file('cover_image')}}--}}
            {{--</div>--}}

            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
            <a href="{{ route('article.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
