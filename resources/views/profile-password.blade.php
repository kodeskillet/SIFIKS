@extends('layouts.user-profile')

@section('user-content')
    <div class="modal-content">
        <div class="modal-header">
            <strong>Ubah Password</strong>
        </div>
        <form action="{{ route('user.password.edit.submit', $data['user']->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group row justify-content-center">
                    <label for="old" class="col-md-3 col-form-label text-md-right">Password Lama</label>
                    <div class="col-md-6">
                        <input type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control" id="old" name="old">
                    </div>
                </div>
                <hr>
                <div class="form-group row justify-content-center">
                    <label for="new" class="col-md-3 col-form-label text-md-right">Password Baru</label>
                    <div class="col-md-6">
                        <input type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control" id="new" name="new">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="new_conf" class="col-md-3 col-form-label text-md-right">Konfirmasi</label>
                    <div class="col-md-6">
                        <input type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control" id="new_conf" name="new_conf">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-success">
                    <strong>Simpan</strong>
                </button>
                <a href="{{ route('user.profile') }}" class="btn btn-danger">
                    <strong>Batal</strong>
                </a>
                <a href="#" class="pull-right ml-3">
                    Lupa Password
                </a>
            </div>
        </form>
    </div>
@endsection