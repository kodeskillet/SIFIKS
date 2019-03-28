@extends('layouts.app')

@include('layouts.inc.navbar')

<div class="container">
    <div class="row">
        <div class="main-container">
            <h3 class="font-weight-bold">Theux Hospital Jombang</h3>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('storage/images/fas1.jpg') }}" class="d-block w-100" width="500px" height="400px" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/images/fas2.jpg') }}" class="d-block w-100" width="500px" height="400px" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/images/fas3.jpg') }}" class="d-block w-100"  width="500px" height="400px" alt="...">
                  </div>
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
        </div>

        <div class="col md 2">
            <ul class="side-container">
                <br> <br>
                <li class="list-group-item ">(0251)36811073 (Panggilan Darurat)</li>
            </ul>
        </div>
    </div>
    

</div>