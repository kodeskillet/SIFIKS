@extends('layouts.app')

@include('layouts.inc.navbar')

<br> <br>
<div class="container">
    <div class="row">
            <div class="card col-md-3" style="width: 18rem;">
                    <br> <br>
                    <img src="{{ asset('storage/images/Contoh.jpg') }}" class="card-user-profile-photo " alt="...">
                    {{-- Yang dibawah itu bentuknya square --}}
                    {{-- <img src="{{ asset('storage/images/test1.jpg') }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body card-user-profile-inner">

                      <h5 class="text-center text-info">{{$user->name}}</h5>
                      <br>
                      <p class="card-text">Bio</p>
                      <div class="card-user-profile">
                          @if($user->biography == null)
                            <i>Silahkan isi bio terlebih dahulu</i>
                          @else
                            {{$user->biography}}
                          @endif
                      </div>

                      <p class="card-text">Email</p>
                      <div class="card-user-profile">{{$user->email}}</div>

                      <p class="card-text">Diskusi</p>
                      <div class="card-user-profile">1</div>
                      <a class="btn btn-primary" href="/User" role="button">Diskusi</a>
                    <a class="btn btn-danger" href= "{{route('user',['id'=>$user->id])}}"role="button">Cancel</a>
                    </div>
                  </div>
                  <div class="nav nav-tabs col-md-6">
                    <div class="row">
                      <div class="col md 5">
                        <h1>Edit Data</h1>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required="" autofocus="">

                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Bio</label>
                            <div class="col-md-6">
                            <textarea class="form-control"  name="biography" value="{{$user->biography}}" cols="80" rows="5"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-8 col-form-label text-md-right"></label>
                            <div class="col md 6">
                                  <button type="button" class="btn btn-primary">Perbarui</button>
                            </div>
                        </div>
                      </div>
                    </div>
                      </div>
    </div>


</div>

















