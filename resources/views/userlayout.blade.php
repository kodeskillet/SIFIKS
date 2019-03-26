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

                  <div class="row">
                    <div class="col md 3">
                      <h1>Diskusi</h1>
                      <hr>
                      <div class="col md 6">
                      <div class="card mb-3" style="max-width: 520px;">
                          <div class="row no-gutters">
                            <div class="col-md-4">
                              <img src="{{ asset('storage/images/Contoh.jpg') }}" class="profile-avatar-img" alt="...">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title text-info">Kenapa Kamu Tidak Mencintaiku?</h5>
                                <p class="card-text">Aku mencintaimu tapi kok kamu artis. Kamu adalah kemungkinan yang aku semogakan</p>
                                <div class="answer-by">
                                  <img src="{{ asset('storage/images/checklist.png') }}" width=14px; height=14px; alt="">
                                    <span>Pertanyaan Telah Terjawab</span>
                                </div>
                                <div class="answer-by">
                                    <img src="{{ asset('storage/images/clock.png') }}" width=14px; height=14px; alt="">
                                      <span>3 Jam Yang Lalu</span>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>

                  <div class="col md 6">
                    <div class="card mb-3" style="max-width: 520px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{ asset('storage/images/Contoh.jpg') }}" class="profile-avatar-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title text-info">Kenapa Kamu Tidak Mencintaiku?</h5>
                              <p class="card-text">Aku mencintaimu tapi kok kamu artis. Kamu adalah kemungkinan yang aku semogakan</p>
                              <div class="answer-by">
                                  <img src="{{ asset('storage/images/clock.png') }}" width=14px; height=14px; alt="">
                                    <span>3 Jam Yang Lalu</span>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

                  </div>
                  
                    </div>
                  
    </div>
</div>