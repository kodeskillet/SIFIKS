@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')
    <div class="container">
        {{-- <div class="text-center mt-4 mb-4"><h3>{{ $data['category'] }}</h3></div> --}}
        <div class="row">
            <div class="col-sm-12">
                <br> <br>
                <div class="input-group">
                    {{-- <input type="text" class="form-control" placeholder="Cari tentang {{ $data['category'] }}..."> --}}
                    <input type="text" class="form-control" placeholder="Cari Tindakan Medis">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h2 class="font-weight-bold">Cari Spesialis</h2>
        <div class="row">
                <div class="index-by-letter-button">
                        <div class="index-by-letter">
                          <ul class="menu-children">
                            
                                 <li class="index-item"><a href="/cari-dokter/ahli-estetika">Ahli Estetika</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-anak">Dokter Anak</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-anastesi">Dokter Anestesi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-bedah">Dokter Bedah</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-bedah-anak">Dokter Bedah Anak</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-bedah-plastik">Dokter Bedah Plastik</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-endokrin">Dokter Endokrin</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-gastroenterologi">Dokter Gastroenterologi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-gigi">Dokter Gigi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-ginjal">Dokter Ginjal</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/ahli-gizi">Dokter Gizi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-jantung">Dokter Jantung</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-kandungan">Dokter Kandungan</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-kulit">Dokter Kulit</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-mata">Dokter Mata</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-onkologi">Dokter Onkologi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-ortopedi">Dokter Ortopedi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-paru">Dokter Paru</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-penyakit-dalam">Dokter Penyakit Dalam</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-radiologi">Dokter Radiologi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-rehabilitasi-medis">Dokter Rehabilitasi Medis</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-reumatologi">Dokter Reumatologi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-saraf">Dokter Saraf</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-tht">Dokter THT</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-umum">Dokter Umum</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-urologi">Dokter Urologi</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/dokter-jiwa">Psikiater</a></li>
                              
                                 <li class="index-item"><a href="/cari-dokter/psikolog">Psikolog</a></li>
                              
                          </ul>
                        </div>
                      </div>
        </div> 
    </div>
@endsection
