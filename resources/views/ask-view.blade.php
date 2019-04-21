@extends('layouts.app')
<link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
@section('content')

    @include('layouts.inc.navbar')

    <br>
    <div class="container">
        <div class="row">
            <div class="col col-md-8">

                @include('layouts.inc.messages')

                <h4>
                    Tanya Dokter
                </h4>
                <a href="{{ route('user.thread.index') }}"><i class="fa fa-arrow-alt-circle-left fa-lg mr-1"></i>Kembali ke diskusi</a>
                <br>
                <hr>
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('storage/user_images/'.$data['thread']->user->profile_picture) }}" alt="User Image">
                            <span class="username"><a href="#">{{ $data['thread']->user->name  }}</a></span>
                            <span class="description">{{ $data['thread']->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="box-body p-4">
                        <a href=""><h5>{{ $data['thread']->topic->topic_name }}</h5></a>
                        <p>{!!  $data['thread']->question !!}</p>
                        @if($data['thread']->doctor_id != null)
                            <span class="pull-left">
                                <i class="fa fa-check-circle text-primary"></i>
                                Dijawab oleh <b>dr. {{ $data['thread']->doctor->name }}</b>
                            </span>
                        @else
                            <span class="pull-right text-muted">Belum terjawab</span>
                        @endif

                        @auth
                            @if($data['thread']->user_id == Auth::user()->id)
                                <div class="float-right">
                                    <small>
                                        <a href="{{ route('user.thread.edit', $data['thread']->id) }}" class="text-success mr-3">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a onclick="$('#del').submit()" href="#" class="text-danger">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </a>
                                    </small>

                                    <form id="del" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')" action="{{ route('user.thread.destroy', $data['thread']->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>

                                </div>
                            @endif
                        @endauth
                    </div>
                    @if($data['thread']->doctor_id != null)
                        <div class="box-footer box-comments">
                            <div class="box-comment">
                                <img class="img-circle img-sm" src="{{ asset('storage/user_images/'.$data['thread']->doctor->profile_picture) }}" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">
                                        dr. {{ $data['thread']->doctor->name }}
                                        <span class="text-muted pull-right">{{ $data['thread']->updated_at->diffForHumans() }}</span>
                                    </span>
                                    <p>{!! $data['thread']->answer !!}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <br>
                @include('layouts.inc.recent-thread')
            </div>
            <div class="col col-md-4">
                <a href="{{ route('user.thread.create') }}"><img src="https://i.ibb.co/tCWCnKK/doctor.png" alt="doctor" width="350"></a>
            </div>
        </div>
    </div>
    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
    <script src="{{ asset("bower_components/fastclick/lib/fastclick.js") }}"></script>
    <script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
    <script src="{{ asset("bower_components/admin-lte/dist/js/demo.js") }}"></script>
    <script src="{{ asset("bower_components/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
