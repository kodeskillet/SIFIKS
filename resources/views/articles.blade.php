@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')

    <div class="container">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari SIFIKS" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>

                    <h2>Cari Berdasarkan Abjad</h2>
                    <button type="button" class="btn btn-primary">A</button>
                    <button type="button" class="btn btn-primary">B</button>
                    <button type="button" class="btn btn-primary">C</button>
                    <button type="button" class="btn btn-primary">D</button>
                    <button type="button" class="btn btn-primary">E</button>
                    <button type="button" class="btn btn-primary">F</button>
                    <button type="button" class="btn btn-primary">G</button>
                    <button type="button" class="btn btn-primary">H</button>
                    <button type="button" class="btn btn-primary">I</button>
                    <button type="button" class="btn btn-primary">J</button>
                    <button type="button" class="btn btn-primary">K</button>
                    <button type="button" class="btn btn-primary">L</button>
                    <button type="button" class="btn btn-primary">M</button>
                    <button type="button" class="btn btn-primary">N</button>
                    <button type="button" class="btn btn-primary">O</button>
                    <button type="button" class="btn btn-primary">P</button>
                    <button type="button" class="btn btn-primary">Q</button>
                    <button type="button" class="btn btn-primary">R</button>
                    <button type="button" class="btn btn-primary">S</button>
                    <button type="button" class="btn btn-primary">T</button>
                    <button type="button" class="btn btn-primary">U</button>
                    <button type="button" class="btn btn-primary">V</button>
                    <button type="button" class="btn btn-primary">W</button>
                    <button type="button" class="btn btn-primary">X</button>
                    <button type="button" class="btn btn-primary">Y</button>
                    <button type="button" class="btn btn-primary">Z</button>

                    <p><h2>{{ $data['category'] }}</h2></p>
                    <p>
                    <ul><li><a href="#">Ablasi Retina</a></li></ul>
                    </p>
                    <p>
                    <ul><li><a href="#">Abses Anus</a></li></ul>
                    </p>
                    <p>
                    <ul><li><a href="#">Abses Gigi</a></li></ul>
                    </p>
                    <p>
                    <ul><li><a href="#">Abses Otak</a></li></ul>
                    </p>
                    <p>
                    <ul><li><a href="#">Abses Paru</a></li></ul>
                    </p>
                    <p>
                    <ul><li><a href="#">Abses Payudara</a></li></ul>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
