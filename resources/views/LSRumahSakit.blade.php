@extends('layouts.app')

@section('content')

    @include('layouts.inc.navbar')
    <div class="container"><br>
        <h2 class="font-weight-bold">Cari Tindakan Medis</h2>
        <div class="row">
            <div class="index-by-letter-button">
                <div class="index-by-letter">
                    <ul class="menu-children">

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'anak'])}}">Anak</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'bedah plastik'])}}">Bedah Plastik</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'bedah tulang'])}}">Bedah Tulang</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'bedah umum'])}}">Bedah Umum</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'estetik'])}}">Estetik</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'gigi dan mulut'])}}">Gigi dan Mulut</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'ginjal'])}}">Ginjal</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'gizi klinik'])}}">Gizi Klinik</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'jantung dan pembuluh darah'])}}">Jantung dan Pembuluh Darah</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'kanker'])}}">Kanker</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'kebidanan dan kandungan'])}}">Kebidanan dan Kandungan</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'anestesi'])}}">Kedokteran Anestesi dan Terapi Intensif</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'kdeokteran umum'])}}">Kedokteran Umum</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'kejiwaan'])}}">Kejiwaan</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'kelenjar'])}}">Kelenjar</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'kulit dan kelamin'])}}">Kulit dan Kelamin</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'laboratorium klinik'])}}">Laboratorium Klinik</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'mata'])}}">Mata</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'paru-paru'])}}">Paru-Paru</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'penyakit dalam'])}}">Penyakit Dalam</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'psikologi'])}}">Psikologi</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'radiologi'])}}">Radiologi</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'rehabilitasi'])}}">Rehabilitasi Medis</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'rematik dan sendi'])}}">Rematik dan Sendi</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'saluran kemih'])}}">Saluran Kemih</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'saraf'])}}">Saraf</a></li>

                    <li class="index-item"><a href="{{route('search.hospital.content', ['content' => 'sistem pencernaan'])}}">Sistem Pencernaan</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
