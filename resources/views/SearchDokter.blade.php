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
                <h2>Pilih Spesialis Dokter</h2>
            </div>
        </div>
    </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
          <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
          <a href="/listdoctor" class="btn btn-primary">Dokter Anak</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listdoctor" class="btn btn-primary">Dokter Paru-Paru</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listdoctor" class="btn btn-primary">Dokter Kehamilan</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listdoctor" class="btn btn-primary">Dokter Jantung</a>
        </div>
      </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
            <a href="/listdoctor" class="btn btn-primary">Dokter Reproduksi</a>
        </div>
      </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
          <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
          <a href="/listdoctor" class="btn btn-primary">Dokter Mata</a>
            </div>
          </div>
  </div>
  
      <a type="button" class="btn btn-primary " href="/lihatsemuadokter">Lihat Semua</a>
  
  
</div>
    
@endsection
