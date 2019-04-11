@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')
    <div class="container">
        <div class="text-center mt-4 mb-4"><h3>{{ $data['category'] }}</h3></div>
        <form action="{{route('cari.articles', ['category' => $data['cat'], 'cari'])}}" method="POST" role="search">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari tentang {{ $data['category'] }}..." name='cari' value="{{ old('cari') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2" value="CARI">Cari</button>
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
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col col-md-8">
                    <h2><b><p>Menampilkan hasil dari {{$data['category']}}</p></b></h2>
                    <hr>
                    <div class="row">
                        @foreach($data['articles'] as $article)
                        <div class="col col-md-6">
                            <a href="{{route('user.article.show',['id'=>$article->id])}}"><h3>{{$article->title}}</h3></a>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col col-md-4">
                    <a href="/ask"><img src="https://i.ibb.co/tCWCnKK/doctor.png" alt="doctor" border="0"width="350"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
