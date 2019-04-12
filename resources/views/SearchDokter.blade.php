@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')
    <div class="container-fluid">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-primary">
            <div class="row justify-content-center">
                <div class="col-md-6 px-0">
                  {{-- <img src="https://i.ibb.co/JQbV1BQ/sifiks5.png" width="45%" alt="sifiks5" border="0"> --}}
                <h1 class="display-4 font-bold" >Cari Nama Dokter/ Spesialis</h1>
                <p class="lead my-3" >Kekayaan bukan berasal dari uang, melainkan kesehatan</p>
                {{-- <hr> --}}
                <ul>
                  <li>Kemudahan dalam mencari Dokter yang di inginkan</li>
                  <li>Terdapat berbagai spesialis dokter yang tersedia</li>
                  <li>Gratis panduan kesehatan untuk anda</li>
                </ul>
                <br>
                {!! Form::open(['action' => 'DoctorController@searchDoctor','method'=> 'POST']) !!}
                    <div class="row">
                        <div class="col-md-5">
                            <label for="nama">Saya mencari informasi tentang:</label>
                            <div class="input-group">
                                {{Form::text ('nama','',['class'=>'form-control','placeholder'=>'Cari Nama Dokter/Spesialis'])}}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="location">Lokasi</label>
                            <div class="input-group">
                                {{ Form::select(
                                    'location',
                                    $data['location'],
                                    null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Pilih Kota'
                                    ]
                                )}}
                                <div class="input-group-append">
                                    {{Form::submit('Cari',['class'=>'btn btn-warning'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-6" >
                  {{-- <div class="img-fluid"> --}}
                      <img src="{{ asset('storage/images/dokterhome.png') }}" class="float-right" alt="Dokter" width="100%">
                  {{-- </div> --}}
              </div>
            </div>
        </div>

    </div>





    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-6">
                    <h2>Pilih Spesialis Dokter</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($data['specialization'] as $specialty)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/images/doctor-icon.png') }}"  alt="{{$specialty->name}}" class="img-thumbnail" >
                        <a href="{{route('list.doctorSpecialty', ['specialty' => $specialty->id])}}" class="btn btn-primary">{{$specialty->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a type="button" class="btn btn-primary " href="{{route('list.doctor')}}">Lihat Semua</a>
    </div>
@endsection
