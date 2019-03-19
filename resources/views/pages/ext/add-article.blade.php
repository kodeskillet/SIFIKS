@extends('layouts.adm-app')
@section('content')
<div class="box box-primary">
    <h1>Membuat Artikel</h1>
        {!! Form::open(['action' => 'ArticleController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group">
                {{Form::label ('category','Category')}}
                {{Form::text ('category','',['class'=>'form-control','placeholder' => 'Masukkan Kategori'])}}
            </div>
            <div class="form-group">
                {{Form::label ('title','Title')}}
                {{Form::text ('title','',['class'=>'form-control','placeholder' => 'Masukkan Judul'])}}
            </div>
            <div class="form-group">
                {{Form::label ('content','Content')}}
                {{Form::textarea ('content','',['id'=>'editor1','class'=>'form-control','placeholder' => 'Masukkan Konten'])}}
            </div>
            <div class="form-group">
                {{Form::file('content_image')}}
            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
