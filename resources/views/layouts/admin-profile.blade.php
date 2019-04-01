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
                    <img class="profile-user-img img-responsive img-circle" src="/bower_components/admin-lte/dist/img/user4-128x128.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $data['admin']->name }}</h3>
                    <p class="text-muted text-center">{{ $data['admin']->email }}</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#">
                                <b>Artikel anda</b>
                                <span class="pull-right">
                                    {{ count($data['admin']->article) }}
                                </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <b>Log Aktivitas</b>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-footer text-center">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <a href="#">Edit Profil</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" data-toggle="modal" data-target="#editPassword">Ubah Password</a>
                        </li>
                        <li class="list-group-item list-group-item-danger">
                            <a href="#" class="text-danger">Hapus Akun</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col col-md-8">
            <div class="box box-widget">
                @yield('admin-content')
            </div>
        </div>
    </section>

    @include('pages.ext.modal.adm-edit-password')
@endsection
