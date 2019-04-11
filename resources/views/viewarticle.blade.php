@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')

<div class="container mt-4">
		<div class="container">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <span class="text-muted">{{ $article->getCat($article->category) }}</span>
                    <h1> {{ $article->title }} </h1>
                    <p>
                        <small>Ditinjau oleh </small>
                        @if($article->admin_id == null)
                            <strong>dr. {{ $article->doctor->name }} {{ $article->doctor->specialty->degree  }}</strong>
                        @else
                            <strong>Admin</strong>
                        @endif
                        <br>
                        <small>{{ $article->created_at->diffForHumans() }}</small>
                    </p>
                </div>
            </div>
            <hr>
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
        </div>
    </div>
</div>
@endsection
