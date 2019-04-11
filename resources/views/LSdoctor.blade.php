@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')

    <div class="container">
        {{-- <div class="text-center mt-4 mb-4"><h3>{{ $data['category'] }}</h3></div> --}}
        <div class="row">
            <div class="col-sm-12">
                <br> <br>
                <div class="input-group">
                    {{-- <input type="text" class="form-control" placeholder="Cari tentang {{ $data['category'] }}..."> --}}
                    <input type="text" class="form-control" placeholder="Cari Tindakan Medis">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h2 class="font-weight-bold">Cari Spesialis</h2>
        <div class="row">
            <div class="index-by-letter-button">
                <div class="index-by-letter">
                    <ul class="menu-children">
                        @foreach($data['specialization'] as $specialty)
                            <li class="index-item"><a href="/listdoctor">{{$specialty->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
