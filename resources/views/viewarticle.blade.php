@extends('layouts.app')

<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">

@section('content')

    @include('layouts.inc.navbar')

<div class="container mt-4">
		<div class="container">
            <div class="row col-md-12">
                <div class="col-md-6">
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
                </div>
            </div>
            <div class="text-center">
                @if ($article->cover_image != null)
                    <img class="center size-full wp-image-1544282" src="{{ asset('storage/cover_images/').'/'.$article->cover_image}}" alt="{{$article->title}}" width="650" height="433">
                @else
                    <img class="alignnone size-full wp-image-1544282" src="{{ asset('storage/cover_images/noimage.jpg')}}" alt="{{$article->title}}" width="650" height="433">
                @endif
            </div>
            <div class="row container">
                <div class="col-md-12">
                    {!! $article->content !!}
                </div>
            </div>
            <p class="mt-5 mb-5">
                <small>Ditinjau oleh </small>
                @if($article->admin_id == null)
                    <strong>dr. {{ $article->doctor->name }} {{ $article->doctor->specialty->degree  }}</strong>
                @else
                    <strong>Admin</strong>
                @endif
                <br>
                <small> <i class="fas fa-clock"></i> {{ $article->created_at->diffForHumans() }}</small>
            </p>
            <br><br><br>
        </div>
    </div>
</div>
@endsection
