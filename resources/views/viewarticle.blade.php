@extends('layouts.app')

@include('layouts.inc.navbar')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
            <article>
                <h1>{{$article->title}}</h1>

                <div>
                    <img src="#">
                    <span>Image source: The WEB</span>
                </div>

                <p>
                    {!!$article->content!!}
                </p>
                <p>
                    <strong>Author:</strong> {{$article->writer}},
                </p>
                <p><strong>Published:</strong> {{$article->created_at}}</p>

            </article>
        </div>
    </div>
</div>
@endsection
