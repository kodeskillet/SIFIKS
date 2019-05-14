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

                <form class="modal-content" action="#" method="POST">
                    @csrf
                    <div class="modal-header">
                        <b>Ubah Pertanyaan</b>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm" style="z-index: 999">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <label for="topic">Topik Pertanyaan</label>
                                <input type="text" class="form-control" id="topic" name="topic" value="{{ $data['thread']->topic->topic_name }}">
                                @if($errors->has('topic'))
                                    <div class="text-danger">
                                        {{$errors->first('topic')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <label for="question">Pertanyaan</label>
                                <textarea id="question" name="question" class="ckeditor form-control">{!! $data['thread']->question !!}</textarea>
                                @if($errors->has('question'))
                                    <div class="text-danger">
                                        {{$errors->first('question')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-success btn-sm">
                            <strong>Simpan</strong>
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" onClick="CKEDITOR.instances.question.setData( '{{ $data['thread']->question }}', function() { this.updateElement(); } )">
                            <strong>Reset</strong>
                        </button>
                    </div>
                </form>
                <hr>
                @include('layouts.inc.recent-thread')
            </div>
            <div class="col col-md-4">
                <a href="#"><img src="{{ asset('storage/images/health.png') }}" alt="health" border="0"width="350"></a>
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
@endsection
