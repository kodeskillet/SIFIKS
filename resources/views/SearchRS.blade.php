@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')
    <div class="container-fluid">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-primary">
            <div class="row justify-content-center">
                <div class="col-md-6 px-0">
                  {{-- <img src="https://i.ibb.co/JQbV1BQ/sifiks5.png" width="45%" alt="sifiks5" border="0"> --}}
                <h1 class="display-4 font-bold" >Cari Tindakan Medis</h1>
                <p class="lead my-3" >Kekayaan bukan berasal dari uang, melainkan kesehatan</p>
                {{-- <hr> --}}
                <ul>
                  <li>Bandingkan estimasi antar rumah sakit yang anda inginkan</li>
                  <li>Terdapat berbagai Tindakan medis yang anda inginkan</li>
                  <li>Temukan Rumah Sakit yang terdekat dengan lokasi anda</li>
                  
                </ul>
                <br>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="tentang">Saya mencari informasi tentang:</label>
                            <div class="input-group">
                            <input id="tentang" type="text" class="form-control" placeholder="Cari Nama Dokter/Spesialis">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="lokasi">Lokasi</label>
                            <div class="input-group">
                                <input id="lokasi" type="text" class="form-control" placeholder="Semua Lokasi">
                                <div class="input-group-append">
                                    <button class="btn btn-warning">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                  <img src="{{ asset('storage/images/dokterhome.png') }}" alt="Dokter" class="float-left thumbnail-fluid" width="180%">
              </div>
            </div>
        </div>
    
    </div>




<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="col-md-6">
                <h2>Pilih Tindakan Medis</h2>
            </div>
        </div>
    </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
          <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
          <a href="/listhospital" class="btn btn-primary">Kandungan</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listhospital" class="btn btn-primary">Laboratorium</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listhospital" class="btn btn-primary">Radiologi</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listhospital" class="btn btn-primary">Jantung</a>
        </div>
      </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listhospital" class="btn btn-primary">Paru-Paru</a>
        </div>
      </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
          <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
          <a href="/listhospital" class="btn btn-primary">Sistem Pencernaan</a>
            </div>
          </div>
  </div>
  
      <a type="button" class="btn btn-primary " href="/lihatsemuars">Lihat Semua</a>
  
  
</div>
    
@endsection
