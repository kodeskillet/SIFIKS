@extends('layouts.app')

<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">

@section('content')

    @include('layouts.inc.navbar')

    <div class="container mt-4 pl-5 pr-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <span class="badge
                        @if($article->category == "penyakit")
                            bg-red
                        @elseif($article->category == "obat")
                            bg-blue
                        @elseif($article->category == "kesehatan")
                            bg-orange
                        @elseif($article->category == "hidup-sehat")
                            bg-yellow
                        @else
                            bg-green
                        @endif
                            ">
                            {{ $article->getCat($article->category) }}
                        </span>
                        <h1 class="mt-2"> {{ $article->title }} </h1>
                        <div class="row">
                            <div class="col mb-2">
                                @include('layouts.inc.sharer')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    @if ($article->cover_image != null && $article->cover_image != "noimage.jpg")
                        <img class="center size-full wp-image-1544282" src="{{ asset('storage/cover_images/'.$article->cover_image) }}" alt="{{$article->title}}" width="650" height="433">
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! $article->content !!}
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <p>
                            Ditinjau oleh
                            @if($article->admin_id == null)
                                <strong>dr. {{ $article->doctor->name }} {{ $article->doctor->specialty->degree  }}</strong>
                            @else
                                <strong>Admin</strong>
                            @endif
                            <br>
                            <small> <i class="fas fa-clock"></i> {{ $article->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                    <div class="col text-right">
                        @include('layouts.inc.sharer')
                    </div>
                </div>
                <br><br><br>
            </div>
            <div class="col col-md-4">
                <br>
                <br>
                <a href="{{ route('user.thread.create') }}"><img src="{{ asset('storage/images/doctor.png') }}" alt="doctor" width="100%"></a>
                <hr>
                <img src="{{ asset('storage/images/health.png') }}" alt="health" width="100%">
            </div>
        </div>
    </div>
@endsection
