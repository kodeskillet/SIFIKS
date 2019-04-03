@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Profile Admin
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="col col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/user_images/'.$data[session('guard')]->profile_picture) }}" alt="User profile picture">
                    <h3 class="profile-username text-center">
                        {{ $data[session('guard')]->name }}
                        <p class="text-muted text-center"><small>{{ $data[session('guard')]->email }}</small></p>
                    </h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('admin.profile', $data[session('guard')]->id) }}">
                                <b>Artikel anda</b>
                                <span class="pull-right text-bold">
                                    {{ count($data[session('guard')]->article) }}
                                </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <b>Log Aktivitas</b>
                                <span class="pull-right">
                                    <i class="fas fa-chart-line"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-footer text-center">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <a href="{{ route('admin.profile.edit', $data[session('guard')]->id) }}">Edit Profil</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('admin.password.edit', $data[session('guard')]->id) }}">Ubah Password</a>
                        </li>
                        <li class="list-group-item list-group-item-danger">
                            <a href="#" class="text-danger">Hapus Akun</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col col-md-9">
            <div class="box box-widget">
                @yield('admin-content')
            </div>
        </div>
    </section>
@endsection
