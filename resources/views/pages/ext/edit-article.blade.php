@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Edit Artikel
            <small><b>( {{$data['article']->title}} )</b></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('article.index') }}">Artikel</a></li>
            <li class="active">Edit Artikel<small>({{ $data['article']->id }})</small></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        @include('layouts.inc.messages')

        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            {!! Form::open(['action' => ['ArticleController@update', $data['article']->id],'method'=> 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    $data['article']->category,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Select a category...'
                    ]
                )}}
            </div>
            <div class="form-group">
                {{Form::label ('title','Title')}}
                {{Form::text ('title',$data['article']->title,['class'=>'form-control','placeholder' => 'Masukkan Judul'])}}
            </div>
            <div class="form-group">
                {{Form::label ('content','Content')}}
                {{Form::textarea ('content',$data['article']->content,['class' => ['form-control', 'ckdefault'],'placeholder' => 'Masukkan Konten'])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Simpan',['class'=>'btn btn-success'])}}
            <a href="{{ route('article.index') }}" class="btn btn-danger">Batal</a>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
