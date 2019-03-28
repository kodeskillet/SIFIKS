@extends('layouts.app')
@include('layouts.inc.navbar')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h1>Test</h1>
        
        </div>



        <div class="col-md-4">

        <div class="card" style="width: 18rem;">
                    <br> <br>
                    <img src="{{ asset('storage/images/namira.jpg') }}" class="card-user-profile-photo " alt="...">
                    
                    <div class="card-body ">
                      
                      <h5 class="text-center">dr. Namira Atasya, Sp.PD</h5>
                      <a href="#" class="text-decoration-none text-center"><p class="text-center">Dokter Penyakit Dalam</p></a>
                      <br><br>
                      <!-- Tindakan Medis -->
                      <p class="font-weight-bold">Tindakan Medis : </p>
                      <ul class="col-sm-10">
                        <li>Konsultasi Penyakit Dalam</li>
                        <li>Konsultasi Imunologi</li>
                        <li>Terapi Alergi</li>
                      </ul>
                    </div>
                  </div>       

        </div>

    
    
    
    </div>
</div>
@endsection
