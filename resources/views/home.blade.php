@extends('layouts.app')

<link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">

@section('content')

    @include('layouts.inc.navbar')

    <div class="container-fluid">

        @include('layouts.inc.messages')

        <div class="jumbotron p-4 p-md-5 text-white rounded bg-primary">
            <div class="row justify-content-center">
                <div class="col-md-6 px-0">
                    <img src="{{ asset('storage/images/sifiks5.png') }}" width="45%" alt="sifiks5" border="0">
                    <p class="lead my-3 font-bold" >Kekayaan bukan berasal dari uang, melainkan kesehatan</p>
                    <br>
                    <div class="row col-md-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari SIFIKS" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn  btn-warning" type="button" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group mr-1" role="group">
                                <a href="{{ route('user.thread.index') }}"><button type="button" class="btn btn-light btn-sm"><b>Tanya Dokter</b></button></a>
                            </div>
                            <div class="btn-group mr-1" role="group">
                                <a href="{{ route('search.doctor') }}"><button type="button" class="btn btn-light btn-sm"><b>Cari Dokter</b></button></a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{route('search.index.hospital')}}"><button type="button" class="btn btn-light btn-sm"><b>Cari Rumah Sakit</b></button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('storage/images/dokterhome.png') }}" alt="Dokter" class="float-right" width="100%" >

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h1>Info Kesehatan Terkini</h1>
        <div class="row">
            @foreach($data['articles'] as $art)
            <a href="{{route('user.article.show',['id'=>$art->id])}}" class="col-md-4 text-decoration-none">
                <div class="card mb-4 shadow-sm">
                    @if($art->cover_image != null)
                        <img src="{{ asset ('storage/cover_images/').'/'.$art->cover_image}}"  alt="{{$art->title}}" class="img-fluid" >
                    @else
                        <img src="{{ asset ('storage/cover_images/noimage.jpg')}}"  alt="{{$art->title}}" class="img-fluid" >
                    @endif
                    <div class="card-body text-black-50">
                        <h4>{{ $art->title }}</h4>
                        <p class="card-text">{!! Str::limit($art->content, 190) !!}</p>
                        <div class="row mt-5">
                            <div class="col-md-6 text-left">
                                <span class="badge
                                @if($art->category == "penyakit")
                                    bg-red
                                @elseif($art->category == "obat")
                                    bg-blue
                                @elseif($art->category == "kesehatan")
                                    bg-orange
                                @elseif($art->category == "hidup-sehat")
                                    bg-yellow
                                @else
                                    bg-green
                                @endif
                                ">
                                    {{ $art->getCat($art->category) }}
                                </span>
                            </div>
                            <div class="col text-right">
                                <small class="text-muted">{{$art->created_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-8">
                @include('layouts.inc.recent-thread')
            </div>
            <div class="col col-md-4">
                <br>
                <br>
                <img src="{{ asset('storage/images/health.png') }}" alt="health" border="0"width="350">
                <a href="{{ route('user.thread.create') }}"><img src="{{ asset('storage/images/doctor.png') }}" alt="doctor" class="mt-5" width="350"></a>
            </div>
        </div>
    </div>
@endsection
