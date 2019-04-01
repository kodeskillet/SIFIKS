@extends('layouts.app')

@section('content')
    @include('layouts.inc.navbar')

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">

                <div class="modal-content">
                    <div class="modal-header p-3">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/user_images/'.$data['user']->profile_picture) }}" class="img-fluid profile-pict" alt="Foto Anda">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <small class="text-muted">Nama</small>
                                <p style="font-size: 1.2rem;">{{ $data['user']->name }}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <small class="text-muted">E-mail</small>
                                <p>{{ $data['user']->email }}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <small class="text-muted">Gender</small>
                                @if($data['user']->gender == null)
                                    <p class="text-muted"><i>belum diatur</i></p>
                                @else
                                    @if($data['user']->gender == "Laki - laki")
                                        <p class="text-info">
                                            <i class="fas fa-mars fa-lg"></i>
                                            {{ $data['user']->gender }}
                                        </p>
                                    @else
                                        <p class="text-pink">
                                            <i class="fas fa-venus fa-lg"></i>
                                            {{ $data['user']->gender }}
                                        </p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <small class="text-muted">Biografi</small>
                                @if($data['user']->biography == null || $data['user']->biography == "")
                                    <p class="text-muted"><i>belum diatur</i></p>
                                @else
                                    <p>{!! $data['user']->biography !!}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <small class="text-muted">Jumlah diskusi</small>
                                <p style="font-size: 1.4rem;">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('user.profile') }}">Diskusi Anda</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('user.profile.edit', ['id' => $data['user']->id]) }}">Edit Profil</a>
                            </li>
                            <li class="list-group-item" title="{{ $data['user']->provider_id != null ? 'Anda terdaftar melalui Google.' : '' }}">
                                @if($data['user']->provider_id == null)
                                    <a href="{{ route('user.password.edit', ['id' => $data['user']->id]) }}">Ubah Password</a>
                                @else
                                    <span class="text-muted">Ubah Password</span>
                                    <i class="fab fa-google fa-pull-right mt-1 text-muted"></i>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <a class="text-danger" href="{{ route('user.profile.destroy') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('destroy-me').submit();">
                                    {{ __('Hapus Akun Anda') }}
                                </a>

                                <form id="destroy-me" action="{{ route('user.profile.destroy') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                @yield('user-content')
            </div>
        </div>
    </div>
@endsection
