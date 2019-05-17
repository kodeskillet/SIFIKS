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
                        <h4 class="text-center">
                            {{ Auth::guard('doctor')->check() ? 'dr.' : ''}}
                            {{ $data[session('guard')]->name }}
                            {{ Auth::guard('doctor')->check() ? ', '.$data['doctor']->specialty["degree"] : ''}}
                        </h4>
                        <p class="text-muted text-center"><small>{{ $data[session('guard')]->email }}</small></p>

                        @auth('doctor')
                            <div class="box-group" id="accordion">
                                <div class="panel box box-info">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <div class="box-header with-border text-center">
                                            <h5 class="box-title">
                                                <small><b>Spesialisasi</b></small>
                                            </h5>
                                        </div>
                                    </a>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="box-body text-center">
                                            {{ $data['doctor']->specialty["name"] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-danger">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <div class="box-header with-border text-center">
                                            <h5 class="box-title">
                                                <small><b>Biografi</b></small>
                                            </h5>
                                        </div>
                                    </a>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="box-body text-center">
                                            @if($data['doctor']->biography == null || $data['doctor']->biography == '')
                                                <span class="text-muted"><i>Belum diatur.</i></span>
                                            @else
                                                {{ $data['doctor']->biography }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth

                    </h3>
                    <br>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a
                            @if(Auth::guard('admin')->check())
                                href="{{ route('admin.profile', $data['admin']->id) }}"
                            @elseif(Auth::guard('doctor')->check())
                                href="{{ route('doctor.profile', $data['doctor']->id) }}"
                            @endif
                            >
                                <b>Artikel anda</b>
                                <span class="label label-primary pull-right text-bold">
                                    {{ count($data[session('guard')]->article) }}
                                </span>
                            </a>
                        </li>
                        @auth('doctor')
                            <li class="list-group-item">
                                <a href="{{ route('doctor.profile.thread', $data['doctor']->id) }}">
                                    <b>Diskusi terjawab</b>
                                    <span class="label label-primary pull-right text-bold">
                                        {{ count($data['doctor']->thread) }}
                                    </span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('doctor.profile.hospital', $data['doctor']->id) }}">
                                    <b>Rumah Sakit anda</b>
                                    <span class="pull-right">
                                        <i class="fas fa-hospital-alt"></i>
                                    </span>
                                </a>
                            </li>
                        @endauth
                        @auth('admin')
                            <li class="list-group-item">
                                <a href="{{ route('admin.profile.log', $data['admin']->id) }}">
                                    <b>Log Aktivitas</b>
                                    <span class="pull-right">
                                        <i class="fas fa-chart-line"></i>
                                    </span>
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a
                            @if(Auth::guard('admin')->check())
                                href="{{ route('admin.profile.edit', $data['admin']->id) }}"
                            @elseif(Auth::guard('doctor')->check())
                                href="{{ route('doctor.profile.edit', $data['doctor']->id) }}"
                            @endif
                            >
                                Edit Profil
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                            @if(Auth::guard('admin')->check())
                                href="{{ route('admin.password.edit', $data['admin']->id) }}"
                            @elseif(Auth::guard('doctor')->check())
                                href="{{ route('doctor.password.edit', $data['doctor']->id) }}"
                            @endif
                            >
                                Ubah Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-footer text-center">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item list-group-item-danger">
                            <form onsubmit="return confirm('Yakin ingin hapus akun?')" method="POST"
                            @if(Auth::guard('admin')->check())
                                action="{{ route('admin.profile.destroy', $data['admin']->id) }}"
                            @elseif(Auth::guard('doctor')->check())
                                action="{{ route('doctor.profile.destroy', $data['doctor']->id) }}"
                            @endif
                            >
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger" value="Hapus Akun" disabled>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col col-md-9">
            @include('layouts.inc.messages')
            <div class="box box-widget">
                @yield('admin-content')
            </div>
        </div>
    </section>
@endsection
