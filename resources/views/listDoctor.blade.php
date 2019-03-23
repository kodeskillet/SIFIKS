@extends('layouts.app')
@include('layouts.inc.navbar')

@section('content')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-info">
        <div class="row">
          <div class="col-md-6 px-0">
              
            <h1 class="display-4 font-bold" >Cari Nama Dokter/ Spesialis</h1>
            <p class="lead my-3" >Kekayaan bukan berasal dari uang, melainkan kesehatan</p>
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
          
        </div>
    </div>


@endsection
