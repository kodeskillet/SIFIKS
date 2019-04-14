@extends('layouts.app')

@include('layouts.inc.navbar')

<div class="container">
    <div class="row">
        <div class="main-container">
            <h1 class="font-weight-bold">{{$data['hospital']->name}}</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    @if($data['hospital']->cover_images_id = null)
                        <img src="{{ asset('storage/images/hospital.jpg')}}" alt="{{$data['hospital']->name}}" class="card-img" >
                    @else
                        <img src="{{ asset('storage/images/hospital.jpg')}}" alt="{{$data['hospital']->name}}" class="card-img">
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <br>
              <h2 class="font-weight-bold"> Profil Rumah Sakit</h2>
              <p>{!! $data['hospital']->biography !!}</p>
              <h3 class="font-weight-bold"> Lokasi</h3>
              <p>{!! $data['hospital']->address !!}</p>
              <h3 class="font-weight-bold">Layanan Medis</h3>
              <div>
                    <p>{!! $data['hospital']->medical_services !!}</p>
              </div>
              <h3 class="font-weight-bold">Layanan Umum</h3>
              <div>
                    <p>{!! $data['hospital']->public_services !!}</p>
              </div>
              <h2 class="font-weight-bold">Tarif Kamar Rumah Sakit</h2>
              @foreach($data['room'] as $key => $room)
                <div class="accordion" id="accordion{{$key}}">
                  <div class="card">
                    <div class="card-header" id="heading{{$key}}">
                      <h2 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true">
                            {{$room->name}}
                        </button>
                      </h2>
                    </div>
                    <div id="collapse{{$key}}" class="collapse " aria-labelledby="heading{{$key}}" data-parent="#accordion{{$key}}">
                      <div class="card-body">
                        <p>Harga Mulai Dari Rp. {{ number_format($room->price_per_night, 2, ",", ".") }}</p>
                        <p>{!! $room->description !!}</p>
                    </div>
                  </div>
                </div>
            </div>
                @endforeach

        <div class="col md 2">
            <ul class="side-container">
                <br> <br>
                <li class="list-group-item "> <img src="{{ asset('storage/images/ambulance.jpg') }}" width=18px; height=18px; alt="">
                    0251 3681107 (Panggilan Darurat)
                </li>
            </ul>
        </div>
    </div>


</div>
