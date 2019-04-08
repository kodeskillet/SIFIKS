@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')
    <div class="container">
        <div class="text-center mt-4 mb-4"><h3>{{ $data['category'] }}</h3></div>
        <form action="{{route('listName.articles',['category' => $data['cat'], 'name'])}}" method="GET" role="search">
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                        {{-- {{ csrf_field() }} --}}
                        <input type="text" class="form-control" placeholder="Cari tentang {{ $data['category'] }}..." name='name'>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
        <div class="row justify-content-center mt-4">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                @foreach(range('A', 'Z') as $key)
                    <div class="btn-group mr-2">
                        <a href="{{route('listName.articles',['category' => $data['cat'],'key' => $key])}}" class="btn btn-primary btn-sm">{{ $key }}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="main-container">
            <div class="helper-title">
                <h1 class="h2">
                    <p>Menampilkan hasil dari {{$data['category']}}</p>
                </h1>
            </div>
            <div class="index-by-letter-button">
                <div class="index-by-letter">
                    <ul class="menu-children">
                        @foreach($data['articles'] as $article)
                        <li class="index-item" style="display:block">
                            <a href="{{route('user.article.show',['id'=>$article->id])}}">{{$article->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection
