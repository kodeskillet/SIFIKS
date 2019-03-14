@extends('layouts.app')

@section('content')
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-info">
        <div class="row">
            <div class="col-md-6 px-0">
                <img src="https://i.ibb.co/JQbV1BQ/sifiks5.png" width="45%" alt="sifiks5" border="0">
                <p class="lead my-3" >Kekayaan bukan berasal dari uang, melainkan kesehatan</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari SIFIKS" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary">Tanya Dokter</button>
                <button type="button" class="btn btn-primary">Cari Dokter</button>
                <button type="button" class="btn btn-primary">Cari Rumah Sakit</button>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/images/dokter.jpg') }}" alt="Dokter" class="img-thumbnail float-right" >
            </div>
        </div>
    </div>
@endsection

@section('content1')
    <h1>Info Kesehatan Terkini</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/images/dokter.jpg') }}"  alt="Buah" class="img-thumbnail" >
                <div class="card-body">
                    <p class="card-text">Apakah mood kamu terasa tidak stabil atau perut terasa kram menjelang dan saat menstruasi? Lima makanan di bawah ini bisa bermanfaat untuk membantumu mengatasi rasa tidak nyaman selama menstruasi. Yuk, cari tahu lebih lanjut!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/images/test1.jpg') }}"  alt="Buah" class="img-thumbnail" >
                <div class="card-body">
                    <p class="card-text">Apakah mood kamu terasa tidak stabil atau perut terasa kram menjelang dan saat menstruasi? Lima makanan di bawah ini bisa bermanfaat untuk membantumu mengatasi rasa tidak nyaman selama menstruasi. Yuk, cari tahu lebih lanjut!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/images/test2.jpg') }}"  alt="Buah" class="img-thumbnail" >
                <div class="card-body">
                    <p class="card-text">Apakah mood kamu terasa tidak stabil atau perut terasa kram menjelang dan saat menstruasi? Lima makanan di bawah ini bisa bermanfaat untuk membantumu mengatasi rasa tidak nyaman selama menstruasi. Yuk, cari tahu lebih lanjut!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text></svg>
                <div class="card-body">
                    <p class="card-text">Apakah mood kamu terasa tidak stabil atau perut terasa kram menjelang dan saat menstruasi? Lima makanan di bawah ini bisa bermanfaat untuk membantumu mengatasi rasa tidak nyaman selama menstruasi. Yuk, cari tahu lebih lanjut!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text></svg>
                <div class="card-body">
                    <p class="card-text">Apakah mood kamu terasa tidak stabil atau perut terasa kram menjelang dan saat menstruasi? Lima makanan di bawah ini bisa bermanfaat untuk membantumu mengatasi rasa tidak nyaman selama menstruasi. Yuk, cari tahu lebih lanjut!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image</text></svg>
                <div class="card-body">
                    <p class="card-text">Apakah mood kamu terasa tidak stabil atau perut terasa kram menjelang dan saat menstruasi? Lima makanan di bawah ini bisa bermanfaat untuk membantumu mengatasi rasa tidak nyaman selama menstruasi. Yuk, cari tahu lebih lanjut!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
