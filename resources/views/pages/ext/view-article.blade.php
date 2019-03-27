@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('article.index') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Preview Artikel
            <small><b>( {{$article->title}} )</b></small>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active"><a href="{{ route('article.index') }}">Artikel</a></li>
            <li class="active">Preview<small>({{ $article->id }})</small></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            <div class="text-muted">
                Ditinjau <strong>{{ $article->created_at->format("d F Y") }}</strong>
                <br>
                Oleh
                <strong>
                    ({{ $article->writer }})
                    @if($article->writer == "Admin")
                        {{ $article->admin->name }}
                    @else
                        {{ $article->doctor->name }}
                    @endif
                </strong>
            </div>
            <hr>
            <h2>{{ $article->title }}</h2><br>
            {!! $article->content !!}
        </div>
    </section>
@endsection
