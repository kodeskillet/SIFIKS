@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')

    <div class="container">
        {{-- <div class="text-center mt-4 mb-4"><h3>{{ $data['category'] }}</h3></div> --}}
        <div class="row">
            <div class="col-sm-12">
                <br> <br>
                {!! Form::open(['action' => 'SpecializationController@searchSpecialty','method'=> 'POST']) !!}
                @csrf
                <div class="input-group">
                    {{-- <input type="text" class="form-control" placeholder="Cari tentang {{ $data['category'] }}..."> --}}
                    {{Form::text ('specialty','',['class'=>'form-control','placeholder'=>'Cari Spesialis'])}}
                    <div class="input-group-append">
                        {{Form::submit('Cari',['class'=>'btn btn-warning'])}}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <h2 class="font-weight-bold">Cari Spesialis</h2>
        @if(count($data['specialization'])>0)
            <div class="row">
                <div class="index-by-letter-button">
                    <div class="index-by-letter">
                        <ul class="menu-children">
                            @foreach($data['specialization'] as $specialty)
                                <li class="index-item"><a href="{{route('list.doctorSpecialty', ['specialty' => $specialty->id])}}">{{$specialty->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @else
        <hr>
            <div class="text-center">
                <h4>Data Tidak Ditemukan Silahkan <a href="{{route('list.doctor')}}">Kembali</a></h4>
                <br>
                <img src="{{ asset('storage/images/sorry1.png') }}"  alt="Sorry">
            </div>
        <hr>
        @endif
    </div>
@endsection
