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

<!-- filter city -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
        
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Aceh
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Bali
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                <label class="form-check-label" for="exampleRadios3">
                    Jakarta
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                <label class="form-check-label" for="exampleRadios4">
                    Malang
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option5">
                <label class="form-check-label" for="exampleRadios5">
                    Papua
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="option6">
                <label class="form-check-label" for="exampleRadios6">
                    Ternate
                </label>
            </div>
        </div>



        <div class="col-md-8">
        
<!-- filter day button -->
            <p>Filter : 
                <a class="btn btn-light btn-sm border" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Hari
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <h3>Pilih Hari Praktik Dokter</h3>
                    <p>Buat Janji sebelum pukul 13:00 WIB untuk konsultasi hari ini.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">Senin</label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">Selasa</label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">Rabu</label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">Kamis</label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                        <label class="form-check-label" for="defaultCheck5">Jumat</label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">
                        <label class="form-check-label" for="defaultCheck6">Sabtu</label>
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">
                        <label class="form-check-label" for="defaultCheck7">Minggu</label>
                    </div>               
                </div>
            </div>

<!-- list doctor -->
            <br>
            <h1 class="font-weight-bold">Cari Jadwal Dokter</h1>

        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('storage/images/test1.jpg') }}" alt="..." class="card-img" >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-primary">Dokter Anak</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('storage/images/test1.jpg') }}" alt="..." class="card-img" >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-primary">Dokter Anak</a>
                    </div>
                </div>
            </div>
        </div>

        </div>

    
    
    
    </div>
</div>
@endsection