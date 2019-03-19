@extends('layouts.adm-app')
@section('content')
<div class="box box-primary container" style="padding-bottom:20px;">
    <h1>Membuat Artikel</h1>
        {!! Form::open(['action' => 'ArticleController@store','method'=> 'POST', 'enctype' => 'multipart/data']) !!}
            <div class="form-group">
                {{Form::label ('category','Category')}}
                {{ Form::select(
                    'category', [
                        'Illness' => 'Illness',
                        'Medications' => 'Medications',
                        'Living Healthy' => 'Living Healthy',
                        'Family' => 'Family',
                        'Healthy' => 'Healthy'
                    ],
                    null, [
                        'class' => 'form-control',
                        'placeholder' => 'Select a category...'
                    ]
                )}}
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
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Add',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection
