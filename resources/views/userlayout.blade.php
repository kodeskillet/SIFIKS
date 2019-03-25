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
                      
                      <p class="card-text">Bio</p>
                      <div class="card-user-profile">Flying-Coders Crew</div>
                      
                      <p class="card-text">Email</p>
                      <div class="card-user-profile">alfazasatria8@gmail.com</div>
                      
                      <p class="card-text">Diskusi</p>
                      <div class="card-user-profile">1</div>
                      <a class="btn btn-primary" href="/User" role="button">Diskusi</a>
                      <a class="btn btn-primary" href="/User/Edit" role="button">Edit Profil</a>
                    </div>
                  </div>
    </div>
</div>