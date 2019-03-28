@extends('layouts.app')

@include('layouts.inc.navbar')

<div class="container">
    <div class="row">
        <div class="main-container">
            <h1 class="font-weight-bold">Theux Hospital Jombang</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
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
                  <div class="carousel-item">
                        <img src="{{ asset('storage/images/fas4.jpg') }}" class="d-block w-100"  width="500px" height="400px" alt="...">
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
              <br>
              <h2 class="font-weight-bold"> Profil Rumah Sakit</h2>
              <p>RS Premier Jatinegara secara resmi menggantikan nama RS Mitra Internasional mulai 12 Agustus 2010. RS Premier Jatinegara adalah sebuah rumah sakit swasta yang menjadi rujukan pelayanan kesehatan bagi dokter dan masyarakat yang membutuhkan. Beroperasi sejak 25 Maret 1989, RS Premier Jatinegara merupakan salah satu rumah sakit swasta terkemuka di Jakarta Timur yang memiliki keunggulan termasuk di dalamnya komitmen terhadap mutu, kemudahan akses, kualitas pelayanan, kelengkapan spesialistik dan alat penunjang medis.</p>
              <p>Cakupan layanan kesehatan yang diberikan oleh RS Premier Jatinegara berbasis pada layanan Satu Atap di mana konsultasi dokter, pemeriksaan penunjang, tindakan operatif, layanan rawat inap hingga pasca rawat inap dapat dilakukan di RS Premier Jatinegara. RS Premier Jatinegara memberikan pelayanan kesehatan untuk pertama kali pada 25 Maret 1989.</p>
              <p>RS Premier Jatinegara memiliki kapasitas 280 tempat tidur dengan fasilitas NICU/PICU (ICU untuk bayi dan anak), ruang perawatan khusus anak, ruang perawatan Stroke Unit, USG 3 D Dynamic, MRI 1,5 Tesla, MSCT Scan, fasilitas gedung parkir, fasilitas gedung rawat jalan.</p>
              <p>Adapun layanan unggulan yang diberikan RS Premier Jatinegara, meliputi Kedokteran Umum, Kedokteran Gigi, Onkologi, Ginekologi, Pediatri, Kedokteran Kulit & Estetik (Kecantikan), promotif dan preventif, Rehabilitasi Medis, Endokrinologi, Optalmologi, Psikiatri, Rheumatologi, THT, Ortopedi, Neurologi, dan Gizi Klinik.</p>
              <h3 class="font-weight-bold"> Lokasi</h3>
              <p>Jl. Raya Jatinegara Timur No. 85-87, RT.10/RW.2, Bali Mester, Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia</p>
              <h3 class="font-weight-bold">Layanan Medis</h3>
              <div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconambulan.jpg') }}" width=20px; height=18px; alt=""> Ambulance
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconmed.jpg') }}" width=18px; height=18px; alt=""> Apotek
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconlab.png') }}" width=18px; height=18px; alt=""> Laboratorium
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconrad.png') }}" width=18px; height=18px; alt=""> Radiologi
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconugd.jpg') }}" width=18px; height=18px; alt=""> Ruang UGD
                            </div>
                    </div>
              </div>
              <h3 class="font-weight-bold">Layanan Umum</h3>
              <div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconatm.png') }}" width=20px; height=18px; alt=""> ATM
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconcafe.png') }}" width=18px; height=18px; alt=""> Kafe
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconmasjid.png') }}" width=18px; height=18px; alt=""> Masjid
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/icon24.png') }}" width=18px; height=18px; alt=""> Layanan 24 Jam
                            </div>
                    </div>
                    <div class="layanan">
                            <div class="layanan-icon">
                                  <img src="{{ asset('storage/images/iconair.png') }}" width=18px; height=18px; alt=""> Kolam Renang
                            </div>
                    </div>
              </div>
            </div>
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