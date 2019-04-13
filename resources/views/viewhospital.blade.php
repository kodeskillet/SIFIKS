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
              <p>Theux Hospital Jombang secara resmi menggantikan nama RS Mitra Internasional mulai 12 Agustus 2010. Theux Hospital Jombang adalah sebuah rumah sakit swasta yang menjadi rujukan pelayanan kesehatan bagi dokter dan masyarakat yang membutuhkan. Beroperasi sejak 25 Maret 1989, Theux Hospital Jombang merupakan salah satu rumah sakit swasta terkemuka di Jakarta Timur yang memiliki keunggulan termasuk di dalamnya komitmen terhadap mutu, kemudahan akses, kualitas pelayanan, kelengkapan spesialistik dan alat penunjang medis.</p>
              <p>Cakupan layanan kesehatan yang diberikan oleh Theux Hospital Jombang berbasis pada layanan Satu Atap di mana konsultasi dokter, pemeriksaan penunjang, tindakan operatif, layanan rawat inap hingga pasca rawat inap dapat dilakukan di Theux Hospital Jombang. Theux Hospital Jombang memberikan pelayanan kesehatan untuk pertama kali pada 25 Maret 1989.</p>
              <p>Theux Hospital Jombang memiliki kapasitas 280 tempat tidur dengan fasilitas NICU/PICU (ICU untuk bayi dan anak), ruang perawatan khusus anak, ruang perawatan Stroke Unit, USG 3 D Dynamic, MRI 1,5 Tesla, MSCT Scan, fasilitas gedung parkir, fasilitas gedung rawat jalan.</p>
              <p>Adapun layanan unggulan yang diberikan Theux Hospital Jombang, meliputi Kedokteran Umum, Kedokteran Gigi, Onkologi, Ginekologi, Pediatri, Kedokteran Kulit & Estetik (Kecantikan), promotif dan preventif, Rehabilitasi Medis, Endokrinologi, Optalmologi, Psikiatri, Rheumatologi, THT, Ortopedi, Neurologi, dan Gizi Klinik.</p>
              <h3 class="font-weight-bold"> Lokasi</h3>
              <p>Jl. Raya Jombang No. 85-87, RT.10/RW.2, Bali Mester, Jombang, Jawa Timur 61481, Indonesia</p>
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
              <h2 class="font-weight-bold">Tarif Kamar Rumah Sakit</h2>
              <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Premiere
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <p>Harga Mulai Dari Rp.3.999.999</p>
                        <p>Fasilitas :</p>
                        <p>-AC</p>
                        <p>-Kulkas</p>
                        <p>-Kasur Elektrik</p>
                        <p>-Kamar Mandi</p>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          VVIP
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        <p>Harga Mulai Dari Rp.2.999.999</p>
                        <p>Fasilitas :</p>
                        <p>-AC</p>
                        <p>-Kulkas</p>
                        <p>-Kasur Elektrik</p>
                        <p>-Kamar Mandi</p>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          VIP
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        <p>Harga Mulai Dari Rp.2.799.999</p>
                        <p>Fasilitas :</p>
                        <p>-AC</p>
                        <p>-Kulkas</p>
                        <p>-Kasur Elektrik</p>
                        <p>-Kamar Mandi</p>
                      </div>
                    </div>
                  </div>
                </div>
              <h2 class="font-weight-bold">Tindakan Medis</h2>
              <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                          Laboratorium
                        </button>
                      </h2>
                    </div>
                
                    <div id="collapseFour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <p>Cek Golongan Darah</p>
                        <p>Fungsi Ginjal</p>
                        <p>Uji Fungsi Hati</p>
                        <p>Profil Lemak</p>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Kedokteran Umum
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        <p>Cek Golongan Darah</p>
                        <p>Fungsi Ginjal</p>
                        <p>Uji Fungsi Hati</p>
                        <p>Profil Lemak</p>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          Bedah Umum
                        </button>
                      </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        <p>Cek Golongan Darah</p>
                        <p>Fungsi Ginjal</p>
                        <p>Uji Fungsi Hati</p>
                        <p>Profil Lemak</p>
                      </div>
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