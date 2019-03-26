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
                      
                      <h5 class="text-center text-info">Alfaza Satria Jalasena</h5>
                      <br>
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
                  <div class="nav nav-tabs col-md-6">
                    <div class="row">
                      <div class="col md 5">
                        <h1>Edit Data</h1>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required="" autofocus="">
        
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Bio</label>
                            <div class="col-md-6">
                              <textarea class="form-control" name="" id="" cols="80" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Kata Sandi Baru</label>
                            <div class="col-md-6">
                                <input id="name" type="password" class="form-control" name="name" value="" required="" autofocus="" placeholder="Kata Sandi Baru">
        
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Ulangi Kata Sandi</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required="" autofocus="" placeholder="Ulangi Kata Sandi">
                            </div>
                        </div>
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

















