@extends('layouts.app')

@include('layouts.inc.navbar')

<br> <br>
<div class="container">
    <div class="row">
            <div class="card col-md-3" style="width: 18rem;">
                    <br> <br>
                    <img src="{{ asset('storage/images/test1.jpg') }}" class="card-user-profile-photo " alt="...">
                    {{-- Yang dibawah itu bentuknya square --}}
                    {{-- <img src="{{ asset('storage/images/test1.jpg') }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body card-user-profile-inner">
                      <h5 class="text-center text-info">Alfaza Satria Jalasena</h5>
                      <br>
                      <p class="card-text">Bio</p>
                      <div class="card-user-profile">-</div>
                      <br>
                      <p class="card-text">Email</p>
                      <div class="card-user-profile">-</div>
                      <br>
                      <p class="card-text">Diskusi</p>
                      <div class="card-user-profile">-</div>
                    </div>
                  </div>
                  
                  <ul class="nav nav-tabs col-md-6">
                        <li class="nav-item">
                          <a class="nav-link active" href="#">Diskusi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Edit Profil</a>
                        </li>
                      </ul>
    </div>
</div>